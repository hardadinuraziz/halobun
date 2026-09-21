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
     * Kirim undangan meeting ke customer
     */
    public function sendMeetingInvite(\App\Models\Booking $booking): bool
    {
        $user      = $booking->user;
        $konsultan = $booking->konsultan;
        $jadwal    = $booking->jadwal;

        $tanggal = $jadwal
            ? $jadwal->tanggal->format('d/m/Y')
            : $booking->sesi_mulai?->format('d/m/Y') ?? '-';

        $jam = $jadwal
            ? $jadwal->jam_mulai . ' - ' . $jadwal->jam_selesai . ' WIB'
            : $booking->sesi_mulai?->format('H:i') . ' WIB' ?? '-';

        $message = "Halo *{$user->name}*! 🌱\n\n";
        $message .= "Pembayaran konfirmasi! Sesi konsultasi Anda di *Hallobun* siap.\n\n";
        $message .= "📋 *Detail Konsultasi:*\n";
        $message .= "• Kode Booking: `{$booking->kode_booking}`\n";
        $message .= "• Konsultan: *{$konsultan->user->name}*\n";
        $message .= "• Spesialisasi: {$konsultan->spesialisasi}\n";
        $message .= "• Tanggal: {$tanggal}\n";
        $message .= "• Waktu: {$jam}\n\n";
        $message .= "🔗 *Link Meeting Jitsi:*\n";
        $message .= "{$booking->meeting_link}\n\n";
        $message .= "⚠️ Harap masuk 5 menit sebelum sesi dimulai.\n\n";
        $message .= "Terima kasih sudah menggunakan layanan Hallobun! 🙏\n";
        $message .= "📞 Bantuan: wa.me/6281234567890";

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
