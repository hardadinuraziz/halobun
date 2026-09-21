<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public function __construct()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    /**
     * Buat transaksi Midtrans Snap dan kembalikan snap_token
     */
    public function createSnapTransaction(Booking $booking): string
    {
        $konsultan = $booking->konsultan;
        $user      = $booking->user;
        $amount    = (float)$konsultan->harga_per_sesi;
        $adminFee  = $this->hitungBiayaAdmin($amount);

        // Buat atau update payment record
        $payment = Payment::updateOrCreate(
            ['booking_id' => $booking->id],
            [
                'amount'      => $amount,
                'biaya_admin' => $adminFee,
                'status'      => 'pending',
                'expired_at'  => now()->addHours(24),
            ]
        );

        $params = [
            'transaction_details' => [
                'order_id'     => $payment->kode_payment,
                'gross_amount' => (int)($amount + $adminFee),
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
                'phone'      => $user->phone ?? '',
            ],
            'item_details' => [
                [
                    'id'       => 'KONSULTASI-' . $booking->id,
                    'price'    => (int)$amount,
                    'quantity' => 1,
                    'name'     => 'Konsultasi Online - ' . $konsultan->user->name,
                ],
                [
                    'id'       => 'ADMIN-FEE',
                    'price'    => (int)$adminFee,
                    'quantity' => 1,
                    'name'     => 'Biaya Admin',
                ],
            ],
            'callbacks' => [
                'finish' => route('payment.finish', $booking->kode_booking),
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $payment->update(['snap_token' => $snapToken]);

        return $snapToken;
    }

    /**
     * Handle callback/notification dari Midtrans
     */
    public function handleCallback(array $data): void
    {
        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId           = $notification->order_id;
        $fraudStatus       = $notification->fraud_status;
        $paymentType       = $notification->payment_type;

        Log::info('Midtrans callback', [
            'order_id' => $orderId,
            'status'   => $transactionStatus,
            'type'     => $paymentType,
        ]);

        $payment = Payment::where('kode_payment', $orderId)->first();

        if (!$payment) {
            Log::warning('Payment not found for order_id: ' . $orderId);
            return;
        }

        // Update metode pembayaran
        $payment->update([
            'metode'             => $this->mapPaymentType($paymentType, $notification),
            'transaction_id'     => $notification->transaction_id,
            'midtrans_response'  => (array)$notification,
        ]);

        if ($transactionStatus === 'capture') {
            if ($fraudStatus === 'accept') {
                $this->markAsPaid($payment);
            }
        } elseif ($transactionStatus === 'settlement') {
            $this->markAsPaid($payment);
        } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            $payment->update(['status' => $transactionStatus === 'expire' ? 'expired' : 'failed']);
        } elseif ($transactionStatus === 'pending') {
            // Ambil VA number atau QRIS URL jika ada
            if (isset($notification->va_numbers[0])) {
                $payment->update(['va_number' => $notification->va_numbers[0]->va_number]);
            }
        }
    }

    private function markAsPaid(Payment $payment): void
    {
        $payment->update([
            'status'  => 'paid',
            'paid_at' => now(),
        ]);

        $booking = $payment->booking;
        $booking->update(['status' => 'confirmed']);

        // Generate meeting room dan kirim notifikasi
        app(VideoCallService::class)->assignMeetingRoom($booking);
        app(NotificationService::class)->sendBookingConfirmation($booking);
    }

    private function hitungBiayaAdmin(float $amount): float
    {
        // Biaya admin 2% min Rp 2.000
        $fee = $amount * 0.02;
        return max($fee, 2000);
    }

    private function mapPaymentType(string $type, $notification): string
    {
        return match ($type) {
            'bank_transfer'     => ($notification->va_numbers[0]->bank ?? '') . '_va',
            'echannel'          => 'mandiri_va',
            'qris', 'gopay', 'shopeepay' => 'qris',
            default             => 'transfer',
        };
    }
}
