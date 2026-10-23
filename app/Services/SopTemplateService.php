<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\KunjunganOffline;
use App\Models\NarsumUndangan;
use Carbon\Carbon;

class SopTemplateService
{
    /**
     * Kanal kontak resmi admin sesuai SOP (Amanda Qori Ifadakh)
     */
    public static function getAdminContact(): string
    {
        return '+62 857-1385-0615 (Amanda)';
    }

    /**
     * Template Konfirmasi Konsultasi sesuai SOP HALLOBUN
     */
    public static function konfirmasiKonsultasi(Booking $booking): string
    {
        $user      = $booking->user;
        $konsultan = $booking->konsultan;
        $jadwal    = $booking->jadwal;

        $praktisiNama   = $konsultan?->user?->name ?? 'Praktisi HalloBun';
        $praktisiGelar  = $konsultan?->klasifikasi_label ? " ({$konsultan->klasifikasi_label})" : '';
        $topik          = $booking->keluhan ?: ($konsultan?->spesialisasi ?? 'Konsultasi Budidaya & Kesehatan Tanaman');
        $durasi         = ($konsultan?->durasi_menit ?? 60) . ' Menit';
        $media          = 'Zoom Meeting / Jitsi Meet';

        $tanggal = $jadwal
            ? Carbon::parse($jadwal->tanggal)->translatedFormat('l, d F Y')
            : ($booking->sesi_mulai ? $booking->sesi_mulai->translatedFormat('l, d F Y') : 'Fleksibel');

        $waktu = $jadwal
            ? substr($jadwal->jam_mulai, 0, 5) . ' - ' . substr($jadwal->jam_selesai, 0, 5) . ' WIB'
            : ($booking->sesi_mulai ? $booking->sesi_mulai->format('H:i') . ' WIB' : 'Sesuai kesepakatan');

        $tautan = $booking->meeting_link ?: ('https://meet.jit.si/hallobun-' . strtolower($booking->kode_booking));
        $adminKontak = self::getAdminContact();

        return "Hallo, Bapak/Ibu {$user->name}, pesanan konsultasi Hallobun telah terkonfirmasi sebagai berikut :\n\n" .
            "Praktisi : {$praktisiNama}{$praktisiGelar}\n" .
            "Topik    : {$topik}\n" .
            "Tanggal  : {$tanggal}\n" .
            "Waktu    : {$waktu}\n" .
            "Durasi   : {$durasi}\n" .
            "Media    : {$media}\n" .
            "Tautan   : {$tautan}\n\n" .
            "Mohon bergabung 5 – 10 menit lebih awal dan menyiapkan informasi yang relevan. Jika terdapat kendala, silakan hubungi admin melalui {$adminKontak}. Terima kasih.";
    }

    /**
     * Template Reminder / Pengingat Sesi Konsultasi
     */
    public static function reminderKonsultasi(Booking $booking): string
    {
        $user      = $booking->user;
        $konsultan = $booking->konsultan;
        $jadwal    = $booking->jadwal;

        $praktisiNama = $konsultan?->user?->name ?? 'Praktisi HalloBun';
        $waktu = $jadwal
            ? substr($jadwal->jam_mulai, 0, 5) . ' WIB'
            : ($booking->sesi_mulai ? $booking->sesi_mulai->format('H:i') . ' WIB' : 'segera');

        $tautan = $booking->meeting_link ?: ('https://meet.jit.si/hallobun-' . strtolower($booking->kode_booking));
        $adminKontak = self::getAdminContact();

        return "Hallo, Bapak/Ibu {$user->name}, pengingat sesi konsultasi Hallobun Anda dengan praktisi *{$praktisiNama}* akan dimulai dalam 1 jam (Pukul {$waktu}).\n\n" .
            "🔗 Tautan Sesi:\n{$tautan}\n\n" .
            "Mohon bergabung 5 – 10 menit lebih awal dan menyiapkan foto atau data tanaman yang relevan. Bantuan: {$adminKontak}. Terima kasih.";
    }

    /**
     * Template Konfirmasi Kunjungan Lahan sesuai SOP HALLOBUN
     */
    public static function konfirmasiKunjungan(KunjunganOffline $kunjungan): string
    {
        $praktisi = $kunjungan->konsultan?->user?->name ?? 'Tim Agronom Lapangan Hallobun';
        $tgl = $kunjungan->tanggal_kunjungan
            ? Carbon::parse($kunjungan->tanggal_kunjungan)->translatedFormat('l, d F Y')
            : 'Sesuai koordinasi';
        $jam = $kunjungan->jam_kunjungan ? "Pukul {$kunjungan->jam_kunjungan} WIB" : 'Pagi/Siang';

        $ruangLingkup = "Pemeriksaan Lahan & Komoditas " . ($kunjungan->jenis_tanaman ?: 'Perkebunan');
        if ($kunjungan->luas_lahan) {
            $ruangLingkup .= " (Luas: {$kunjungan->luas_lahan} {$kunjungan->satuan_lahan})";
        }
        $ruangLingkup .= " di {$kunjungan->kota}, {$kunjungan->provinsi}";

        $biaya = $kunjungan->biaya > 0
            ? "Rp " . number_format($kunjungan->biaya, 0, ',', '.') . " (Termasuk transportasi & asesmen lapangan)"
            : "Sesuai kesepakatan penawaran tertulis & survei awal";

        $adminKontak = self::getAdminContact();

        return "Hallo, Bapak/Ibu {$kunjungan->nama_pemilik}, permintaan kunjungan lahan Hallobun dengan nomor #KJ-{$kunjungan->id} telah terkonfirmasi sebagai berikut :\n\n" .
            "Praktisi            : {$praktisi}\n" .
            "Tanggal dan Waktu   : {$tgl} ({$jam})\n" .
            "Ruang Lingkup       : {$ruangLingkup}\n" .
            "Biaya dan Ketentuan : {$biaya}\n\n" .
            "Mohon memastikan akses lokasi dan data pendukung tersedia. Perubahan jadwal dapat disampaikan melalui {$adminKontak}. Terima kasih.";
    }

    /**
     * Template Konfirmasi Undang Narasumber sesuai SOP HALLOBUN
     */
    public static function konfirmasiNarasumber(NarsumUndangan $narsum): string
    {
        $narasumber = $narsum->konsultan?->user?->name ?? 'Narasumber / Tenaga Ahli Hallobun';
        $tgl = $narsum->tanggal_acara
            ? Carbon::parse($narsum->tanggal_acara)->translatedFormat('l, d F Y')
            : 'Sesuai Rundown';
        $waktu = ($narsum->jam_mulai ?: '09:00') . ' - ' . ($narsum->jam_selesai ?: '12:00') . ' WIB';
        $durasi = $narsum->durasi ?: 'Sesuai durasi acara';
        $formatLokasi = strtoupper($narsum->format) . " - " . ($narsum->lokasi ? "{$narsum->lokasi}, {$narsum->kota}" : $narsum->kota);
        $materiTeknis = $narsum->deskripsi_kebutuhan ?: 'Paparan materi & sesi tanya jawab interaktif';
        $pic = "{$narsum->penyelenggara} (PIC: {$narsum->kontak_pic} - " . ($narsum->phone_pic ?: '-') . ")";

        $adminKontak = self::getAdminContact();

        return "Hallo, Bapak/Ibu {$narsum->kontak_pic}, pesanan/undangan narasumber Hallobun telah terkonfirmasi sebagai berikut :\n\n" .
            "Tema                                : {$narsum->tema}\n" .
            "Narasumber                          : {$narasumber}\n" .
            "Tanggal                             : {$tgl}\n" .
            "Waktu                               : {$waktu}\n" .
            "Durasi                              : {$durasi}\n" .
            "Format/Lokasi                       : {$formatLokasi}\n" .
            "Lingkup Materi dan Kebutuhan Teknis : {$materiTeknis}\n" .
            "PIC Penyelenggara                   : {$pic}\n\n" .
            "Mohon informasikan perubahan melalui {$adminKontak}. Terima kasih.";
    }

    /**
     * Template Konfirmasi Pesanan Toko Sarana Tani sesuai SOP HALLOBUN
     */
    public static function konfirmasiPesananToko(
        string $namaCustomer,
        string $produkDanJumlah,
        string $total,
        string $statusBayar = 'Lunas (Bank Mandiri 1030012983454 a.n CV SARANA HIJAU)',
        string $statusPengiriman = 'Sedang Diproses & Dipacking',
        string $nomorResi = 'Akan diinfokan setelah paket diserahkan ke kurir'
    ): string {
        $adminKontak = self::getAdminContact();

        return "Hallo, Bapak/Ibu {$namaCustomer}, pesanan toko sarana tani Hallobun telah terkonfirmasi sebagai berikut :\n\n" .
            "Produk dan Jumlah            : {$produkDanJumlah}\n" .
            "Total                        : {$total}\n" .
            "Status Pembayaran            : {$statusBayar}\n" .
            "Status Pemrosesan/Pengiriman : {$statusPengiriman}\n" .
            "Nomor Resi                   : {$nomorResi}\n\n" .
            "Untuk pertanyaan atau ketidaksesuaian pesanan hubungi admin melalui {$adminKontak}. Terima kasih.";
    }
}
