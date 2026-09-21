<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Payment;
use App\Mail\BookingConfirmationMail;
use App\Mail\MeetingInviteMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function __construct(
        private WhatsAppService $whatsAppService
    ) {}

    /**
     * Kirim konfirmasi booking setelah pembayaran berhasil
     * (via Email + WhatsApp)
     */
    public function sendBookingConfirmation(Booking $booking): void
    {
        $user = $booking->user;

        // Kirim Email
        try {
            Mail::to($user->email)->send(new BookingConfirmationMail($booking));
            Log::info("Email konfirmasi terkirim ke {$user->email}");
        } catch (\Exception $e) {
            Log::error('Gagal kirim email konfirmasi: ' . $e->getMessage());
        }

        // Kirim WhatsApp
        if ($user->phone) {
            $this->whatsAppService->sendMeetingInvite($booking);
        }
    }

    /**
     * Kirim reminder 1 jam sebelum sesi
     */
    public function sendSessionReminder(Booking $booking): void
    {
        $user    = $booking->user;
        $message = "⏰ *Reminder Konsultasi!*\n\n";
        $message .= "Halo *{$user->name}*, sesi konsultasi Anda dimulai dalam *1 JAM*.\n\n";
        $message .= "🔗 Link Meeting:\n{$booking->meeting_link}\n\n";
        $message .= "Siapkan pertanyaan Anda! 🌱 Hallobun";

        if ($user->phone) {
            $this->whatsAppService->sendMessage($user->phone, $message);
        }
    }

    /**
     * Notifikasi ke konsultan ada booking baru
     */
    public function notifyKonsultanBookingBaru(Booking $booking): void
    {
        $konsultan = $booking->konsultan;
        $user      = $konsultan->user;

        $message = "📩 *Booking Baru!*\n\n";
        $message .= "Halo *{$user->name}*, ada booking konsultasi baru.\n\n";
        $message .= "👤 Customer: {$booking->user->name}\n";
        $message .= "📅 Jadwal: {$booking->jadwal?->tanggal?->format('d/m/Y')} ";
        $message .= "{$booking->jadwal?->jam_mulai}\n";
        $message .= "💬 Keluhan: {$booking->keluhan}\n\n";
        $message .= "Cek dashboard: " . config('app.url') . "/konsultan/dashboard\n\n";
        $message .= "Hallobun 🌱";

        if ($user->phone) {
            $this->whatsAppService->sendMessage($user->phone, $message);
        }
    }
}
