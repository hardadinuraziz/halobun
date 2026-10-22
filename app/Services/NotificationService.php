<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\NarsumUndangan;
use App\Models\KunjunganOffline;
use App\Mail\BookingConfirmationMail;
use App\Mail\MeetingInviteMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
        $message .= "Cek dashboard: " . config('app.url') . "/admin/bookings\n\n";
        $message .= "Hallobun 🌱";

        if ($user->phone) {
            $this->whatsAppService->sendMessage($user->phone, $message);
        }
    }

    /**
     * Notifikasi ke WhatsApp Admin (Amanda) ketika ada order / booking konsultasi baru
     */
    public function notifyAdminBookingBaru(Booking $booking): void
    {
        $adminPhone = config('hallobun.admin_phone', '085713850615');
        $adminName  = config('hallobun.admin_name', 'Amanda');
        $user       = $booking->user;
        $konsultan  = $booking->konsultan;
        $amount     = $booking->payment?->amount ?? $konsultan->harga_per_sesi;
        $jadwal     = $booking->jadwal;

        $tanggal = $jadwal ? $jadwal->tanggal->format('d M Y') : 'Fleksibel';
        $jam     = $jadwal ? substr($jadwal->jam_mulai, 0, 5) . ' - ' . substr($jadwal->jam_selesai, 0, 5) . ' WIB' : 'Fleksibel';

        $message  = "🔔 *NOTIFIKASI ORDER KONSULTASI BARU!* 🌱\n\n";
        $message .= "Halo Kak *{$adminName}*, ada pesanan konsultasi baru yang masuk di website Hallobun:\n\n";
        $message .= "📋 *Rincian Booking:*\n";
        $message .= "• Kode Booking: `{$booking->kode_booking}`\n";
        $message .= "• Pemesan / Customer: *{$user->name}* (" . ($user->phone ?: 'No HP tidak dicantumkan') . ")\n";
        $message .= "• Praktisi Dipilih: *{$konsultan->user->name}* (" . ucfirst($konsultan->klasifikasi) . ")\n";
        $message .= "• Bidang: {$konsultan->spesialisasi}\n";
        $message .= "• Jadwal: {$tanggal} ({$jam})\n";
        $message .= "• Nilai Transaksi: *Rp " . number_format($amount, 0, ',', '.') . "*\n";
        $message .= "• Rekening Tujuan: Bank Mandiri (1030012983454 a.n CV SARANA HIJAU)\n";
        $message .= "• Topik / Keluhan: {$booking->keluhan}\n\n";
        $message .= "👉 Cek dan kelola di dashboard admin:\n";
        $message .= config('app.url') . "/admin/bookings\n\n";
        $message .= "— Sistem Notifikasi Otomatis Hallobun";

        $this->whatsAppService->sendMessage($adminPhone, $message);
    }

    /**
     * Notifikasi ke WhatsApp Admin (Amanda) ketika ada permintaan narasumber baru
     */
    public function notifyAdminNarsumBaru(NarsumUndangan $undangan): void
    {
        $adminPhone = config('hallobun.admin_phone', '085713850615');
        $adminName  = config('hallobun.admin_name', 'Amanda');

        $tgl = $undangan->tanggal_acara ? Carbon::parse($undangan->tanggal_acara)->format('d M Y') : '-';

        $message  = "🎤 *PERMINTAAN UNDANG NARASUMBER BARU!* 🌱\n\n";
        $message .= "Halo Kak *{$adminName}*, ada pengajuan undangan narasumber baru di Hallobun:\n\n";
        $message .= "• Nama Acara: *{$undangan->nama_acara}*\n";
        $message .= "• Penyelenggara: {$undangan->penyelenggara}\n";
        $message .= "• Tanggal & Waktu: {$tgl} ({$undangan->jam_mulai} - {$undangan->jam_selesai})\n";
        $message .= "• Lokasi: {$undangan->lokasi}, {$undangan->kota}\n";
        $message .= "• Tema: {$undangan->tema}\n";
        $message .= "• Format: " . strtoupper($undangan->format) . " (Est. {$undangan->estimasi_peserta} peserta)\n";
        $message .= "• Kontak PIC: *{$undangan->kontak_pic}* (" . ($undangan->phone_pic ?: '-') . ")\n";
        if ($undangan->budget) {
            $message .= "• Estimasi Budget: Rp " . number_format($undangan->budget, 0, ',', '.') . "\n";
        }
        $message .= "• Kebutuhan: {$undangan->deskripsi_kebutuhan}\n\n";
        $message .= "👉 Cek dan follow up di panel admin:\n";
        $message .= config('app.url') . "/admin/narsum\n\n";
        $message .= "— Sistem Notifikasi Otomatis Hallobun";

        $this->whatsAppService->sendMessage($adminPhone, $message);
    }

    /**
     * Notifikasi ke WhatsApp Admin (Amanda) ketika ada permintaan kunjungan kebun baru
     */
    public function notifyAdminKunjunganBaru(KunjunganOffline $kunjungan): void
    {
        $adminPhone = config('hallobun.admin_phone', '085713850615');
        $adminName  = config('hallobun.admin_name', 'Amanda');

        $tgl = $kunjungan->tanggal_kunjungan ? Carbon::parse($kunjungan->tanggal_kunjungan)->format('d M Y') : '-';

        $message  = "🚜 *PERMINTAAN KUNJUNGAN LAHAN / SURVEI BARU!* 🌱\n\n";
        $message .= "Halo Kak *{$adminName}*, ada permohonan kunjungan kebun baru di Hallobun:\n\n";
        $message .= "• Pemilik Lahan: *{$kunjungan->nama_pemilik}*\n";
        $message .= "• No. WhatsApp: {$kunjungan->phone}\n";
        $message .= "• Rencana Tanggal: {$tgl} (Pukul {$kunjungan->jam_kunjungan})\n";
        $message .= "• Lokasi Kebun: {$kunjungan->alamat_lahan}, {$kunjungan->kota}, {$kunjungan->provinsi}\n";
        $message .= "• Jenis Tanaman: {$kunjungan->jenis_tanaman}\n";
        $message .= "• Luas Lahan: {$kunjungan->luas_lahan} {$kunjungan->satuan_lahan}\n";
        $message .= "• Masalah Lahan: {$kunjungan->masalah_yang_dihadapi}\n\n";
        $message .= "👉 Cek dan hubungi pemilik lahan:\n";
        $message .= config('app.url') . "/admin/kunjungan\n\n";
        $message .= "— Sistem Notifikasi Otomatis Hallobun";

        $this->whatsAppService->sendMessage($adminPhone, $message);
    }

    /**
     * Notifikasi ke WhatsApp Admin (Amanda) ketika pembayaran masuk / lunas
     */
    public function notifyAdminPembayaranMasuk(Payment $payment): void
    {
        $adminPhone = config('hallobun.admin_phone', '085713850615');
        $adminName  = config('hallobun.admin_name', 'Amanda');
        $booking    = $payment->booking;

        $message  = "💰 *PEMBAYARAN KONSULTASI LUNAS!* ✅\n\n";
        $message .= "Halo Kak *{$adminName}*, pembayaran order telah terverifikasi lunas:\n\n";
        $message .= "• Kode Booking: `{$booking->kode_booking}`\n";
        $message .= "• Customer: *{$booking->user->name}*\n";
        $message .= "• Konsultan: *{$booking->konsultan->user->name}*\n";
        $message .= "• Nominal: *Rp " . number_format($payment->totalAmount(), 0, ',', '.') . "*\n";
        $message .= "• Metode: " . strtoupper($payment->metode ?? 'Transfer Mandiri') . "\n";
        $message .= "• Waktu Bayar: " . now()->format('d M Y H:i') . " WIB\n\n";
        $message .= "Jadwal dan ruang konsultasi siap dilaksanakan. Cek panel admin:\n";
        $message .= config('app.url') . "/admin/bookings\n\n";
        $message .= "— Sistem Notifikasi Otomatis Hallobun";

        $this->whatsAppService->sendMessage($adminPhone, $message);
    }
}
