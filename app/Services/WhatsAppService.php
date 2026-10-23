<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    private string $apiUrl   = 'https://api.fonnte.com/send';
    private string $apiToken;

    public function __construct()
    {
        $this->apiToken = config('hallobun.fonnte_token', '');
    }

    /**
     * Kirim pesan WhatsApp
     */
    public function sendMessage(string $phone, string $message): bool
    {
        if (empty($this->apiToken)) {
            Log::warning('WhatsApp API token tidak dikonfigurasi');
            return false;
        }

        // Format nomor Indonesia
        $phone = $this->formatPhone($phone);

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->apiToken,
            ])->post($this->apiUrl, [
                'target'  => $phone,
                'message' => $message,
            ]);

            if ($response->successful()) {
                Log::info("WA terkirim ke {$phone}");
                return true;
            }

            Log::error('WA gagal dikirim', ['response' => $response->json()]);
            return false;
        } catch (\Exception $e) {
            Log::error('WA exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Kirim konfirmasi sesi konsultasi ke customer sesuai SOP HALLOBUN
     */
    public function sendMeetingInvite(\App\Models\Booking $booking): bool
    {
        $user = $booking->user;
        $message = \App\Services\SopTemplateService::konfirmasiKonsultasi($booking);

        return $this->sendMessage($user->phone ?? '', $message);
    }

    /**
     * Kirim notifikasi konfirmasi pembayaran
     */
    public function sendPaymentConfirmation(\App\Models\Payment $payment): bool
    {
        $booking  = $payment->booking;
        $user     = $booking->user;

        $message = "✅ *Pembayaran Berhasil!*\n\n";
        $message .= "Halo *{$user->name}*, pembayaran Anda telah dikonfirmasi.\n\n";
        $message .= "💳 *Detail Pembayaran:*\n";
        $message .= "• No. Pembayaran: `{$payment->kode_payment}`\n";
        $message .= "• Jumlah: Rp " . number_format($payment->totalAmount(), 0, ',', '.') . "\n";
        $message .= "• Status: ✅ LUNAS\n\n";
        $message .= "Booking Anda sedang diproses. Anda akan mendapat link meeting segera.\n\n";
        $message .= "Hallobun 🌱 - Platform Konsultasi Pertanian";

        return $this->sendMessage($user->phone ?? '', $message);
    }

    /**
     * Format nomor HP ke format internasional
     */
    private function formatPhone(string $phone): string
    {
        // Hapus karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Ganti awalan 0 dengan 62
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        // Tambah 62 jika belum ada
        if (!str_starts_with($phone, '62')) {
            $phone = '62' . $phone;
        }

        return $phone;
    }
}
