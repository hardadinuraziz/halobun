<?php

$logoPath = __DIR__ . '/../public/images/logo.png';
$logoBase64 = '';
if (file_exists($logoPath)) {
    $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
}

$date = date('d F Y, H:i') . ' WIB';
$chromePath = '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';

// ══════════════════════════════════════════════════════════════════════════════
// 1. PANDUAN LENGKAP (3 HALAMAN)
// ══════════════════════════════════════════════════════════════════════════════
$htmlHandbook = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Buku Panduan Administrator & Dokumentasi Proyek Hallobun</title>
<style>
    @page { size: A4; margin: 13mm 15mm 13mm 15mm; }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; color: #1f2937; line-height: 1.4; background: #fff; font-size: 10px; }
    .page-break { page-break-after: always; }
    .doc-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #16a34a; padding-bottom: 8px; margin-bottom: 12px; }
    .doc-header img { height: 34px; width: auto; }
    .doc-meta { text-align: right; }
    .badge-conf { display: inline-block; background: #fee2e2; color: #991b1b; font-size: 7.5px; font-weight: 800; padding: 2px 7px; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 2px; }
    .meta-sub { font-size: 8.5px; color: #6b7280; }
    .doc-footer { margin-top: 12px; border-top: 1px solid #e5e7eb; padding-top: 5px; display: flex; justify-content: space-between; font-size: 8px; color: #9ca3af; }
    h1 { font-size: 16px; font-weight: 800; color: #14532d; margin-bottom: 2px; }
    h2 { font-size: 11.5px; font-weight: 700; color: #15803d; margin-top: 10px; margin-bottom: 6px; display: flex; align-items: center; gap: 5px; }
    h2::before { content: ""; display: inline-block; width: 3.5px; height: 12px; background: #16a34a; border-radius: 2px; }
    p.lead { font-size: 9px; color: #4b5563; margin-bottom: 8px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 9px; font-size: 9px; }
    th { background: #f0fdf4; color: #166534; font-weight: 700; text-align: left; padding: 5px 7px; border: 1px solid #bbf7d0; text-transform: uppercase; font-size: 7.5px; letter-spacing: 0.4px; }
    td { padding: 4.5px 7px; border: 1px solid #e5e7eb; color: #374151; vertical-align: top; }
    tr:nth-child(even) td { background: #f9fafb; }
    .badge-ok { display: inline-block; background: #dcfce7; color: #15803d; font-weight: 700; font-size: 7.5px; padding: 1.5px 5px; border-radius: 4px; border: 1px solid #86efac; white-space: nowrap; }
    .badge-admin { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; font-weight: 700; font-size: 8px; padding: 1.5px 5px; border-radius: 4px; }
    .code { font-family: ui-monospace, Menlo, Consolas, monospace; background: #f3f4f6; padding: 1px 4px; border-radius: 3px; font-size: 8.5px; border: 1px solid #e5e7eb; }
    .pwd { font-family: ui-monospace, Menlo, Consolas, monospace; background: #fef08a; color: #854d0e; font-weight: 700; padding: 1px 6px; border-radius: 3px; border: 1px solid #fde047; }
    .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 6px; padding: 9px 11px; margin-bottom: 8px; }
    .card-green { background: #f0fdf4; border-color: #86efac; }
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 9px; }
    .step { margin-bottom: 6px; padding-left: 22px; position: relative; }
    .step-n { position: absolute; left: 0; top: 0; width: 16px; height: 16px; background: #16a34a; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 8px; font-weight: 800; }
    .step-t { font-weight: 700; font-size: 9.5px; color: #111827; margin-bottom: 1px; }
    .step-d { font-size: 8.5px; color: #4b5563; line-height: 1.35; }
    .notice { background: #fffbeb; border: 1px solid #fcd34d; border-radius: 5px; padding: 7px 10px; margin-top: 7px; font-size: 8px; color: #92400e; }
    .notice strong { color: #78350f; }
    .badge-pay { display: inline-block; background: #eff6ff; color: #1d4ed8; font-weight: 700; font-size: 7.5px; padding: 1.5px 5px; border-radius: 4px; border: 1px solid #bfdbfe; }
</style>
</head>
<body>

<!-- HALAMAN 1: REQUIREMENT & SISTEM PEMBAYARAN -->
<div class="doc-header">
    <img src="{$logoBase64}" alt="Hallobun">
    <div class="doc-meta">
        <div class="badge-conf">DOKUMEN RESMI SISTEM</div>
        <div class="meta-sub">REF: HBN-SYS-DOC-2026/V3</div>
        <div class="meta-sub">Diperbarui: {$date}</div>
    </div>
</div>

<h1>Buku Panduan Administrator & Dokumentasi Proyek Hallobun</h1>
<p class="lead">Dokumentasi komprehensif seluruh requirement, sistem pembayaran QRIS & Transfer Bank (Midtrans), alur pemesanan, daftar akun, dan tutorial operasional platform <strong>Hallobun Indonesia</strong>.</p>

<h2>1. Rekapitulasi Requirement yang Telah Diimplementasikan</h2>
<table>
    <thead><tr><th style="width:26%">Modul / Requirement</th><th style="width:48%">Implementasi Teknis</th><th style="width:12%">Status</th><th style="width:14%">Akses URL</th></tr></thead>
    <tbody>
        <tr><td><strong>Konsultasi Online (Video Call Zoom/Jitsi)</strong></td><td>Tele-agronomi real-time via Jitsi Meet Engine langsung di peramban (kamera, mikrofon, screen sharing). Room otomatis dibuat per booking setelah pembayaran lunas.</td><td><span class="badge-ok">Selesai 100%</span></td><td><span class="code">/konsultasi</span></td></tr>
        <tr><td><strong>Kunjungan Lahan On-Site</strong></td><td>Formulir permohonan inspeksi fisik kebun, audit tanah & hama. Jadwal dikonfirmasi admin, tim agronom dikirim ke lokasi. Riwayat tersimpan di dashboard user.</td><td><span class="badge-ok">Selesai 100%</span></td><td><span class="code">/kunjungan</span></td></tr>
        <tr><td><strong>Undang Narasumber & Bimtek</strong></td><td>Permohonan pemateri workshop, bimtek kelompok tani, webinar, dan penyuluhan komunitas. Divalidasi dan dijadwalkan oleh admin.</td><td><span class="badge-ok">Selesai 100%</span></td><td><span class="code">/narsum</span></td></tr>
        <tr><td><strong>Toko Sarana Tani</strong></td><td>Etalase benih bersertifikat, pupuk organik, pestisida nabati, dan alat berkebun. Filter kategori, harga coret promo. Pemesanan via WhatsApp — bebas tanpa login.</td><td><span class="badge-ok">Selesai 100%</span></td><td><span class="code">/sarana</span></td></tr>
        <tr><td><strong>Pembayaran QRIS & Transfer Bank</strong></td><td>Terintegrasi penuh dengan Midtrans Snap. Mendukung QRIS (GoPay/OVO/Dana/ShopeePay/m-Banking), Transfer Bank VA (BCA, BNI, BRI, Mandiri, Permata), dan Kartu Kredit/Debit.</td><td><span class="badge-ok">Selesai 100%</span></td><td>Midtrans Snap</td></tr>
        <tr><td><strong>Alur Guest vs. Login (Hybrid Auth)</strong></td><td>Browsing, melihat katalog, dan pemesanan sarana: bebas tanpa login. Konsultasi video call, kunjungan lahan & narsum: memerlukan akun untuk keamanan room meeting & riwayat transaksi.</td><td><span class="badge-ok">Selesai 100%</span></td><td>Semua Halaman</td></tr>
        <tr><td><strong>Desain Minimalis & Profesional</strong></td><td>Perombakan UI: pangkas text bloat, generous whitespace, tipografi modern, card bersih, dan fokus pada aksi utama. Palet JuruTani <span class="code">#16A34A</span> / <span class="code">#15803D</span>.</td><td><span class="badge-ok">Selesai 100%</span></td><td>/ (Beranda)</td></tr>
        <tr><td><strong>Slider 5 Foto Asli Praktisi</strong></td><td>100% foto dokumentasi asli praktisi perkebunan Indonesia. Animasi cross-fade otomatis 5 slide + hover pause, prev/next arrows, dan 5 dot indikator.</td><td><span class="badge-ok">Selesai 100%</span></td><td><span class="code">/ & /dashboard</span></td></tr>
        <tr><td><strong>Dashboard Pengguna & Riwayat</strong></td><td>Dashboard interaktif pasca-login untuk monitoring jadwal sesi video call, status survei lahan, permohonan narsum, dan riwayat pembayaran Midtrans.</td><td><span class="badge-ok">Selesai 100%</span></td><td><span class="code">/dashboard</span></td></tr>
        <tr><td><strong>Mobile-First Responsive</strong></td><td>Tampilan proporsional di semua layar (mobile drawer nav, touch-friendly scrollable tables, modal responsif).</td><td><span class="badge-ok">Selesai 100%</span></td><td>Semua Halaman</td></tr>
    </tbody>
</table>

<h2>2. Sistem Pembayaran — QRIS, Transfer Bank & Kartu (Midtrans Snap)</h2>

<div class="grid-2">
    <div class="card card-green" style="padding: 8px 10px;">
        <div style="font-weight: 800; font-size: 10px; color: #166534; margin-bottom: 5px;">💳 Metode Pembayaran Tersedia</div>
        <table style="margin-bottom: 0; font-size: 8.8px;">
            <tr><td style="border: none; padding: 2px 0; font-weight: 700; width: 40%;">QRIS</td><td style="border: none; padding: 2px 0;">Scan dari GoPay, OVO, Dana, ShopeePay, atau m-Banking mana pun</td></tr>
            <tr><td style="border: none; padding: 2px 0; font-weight: 700;">Transfer Bank VA</td><td style="border: none; padding: 2px 0;">BCA, BNI, BRI, Mandiri, Permata Virtual Account</td></tr>
            <tr><td style="border: none; padding: 2px 0; font-weight: 700;">Kartu Kredit/Debit</td><td style="border: none; padding: 2px 0;">Visa, Mastercard, JCB (3D Secure aktif)</td></tr>
            <tr><td style="border: none; padding: 2px 0; font-weight: 700;">Gateway</td><td style="border: none; padding: 2px 0;"><strong>Midtrans Snap</strong> (PCI DSS Certified)</td></tr>
            <tr><td style="border: none; padding: 2px 0; font-weight: 700;">Biaya Admin</td><td style="border: none; padding: 2px 0;">2% dari nilai transaksi (min. Rp 2.000)</td></tr>
        </table>
    </div>
    <div class="card" style="padding: 8px 10px;">
        <div style="font-weight: 800; font-size: 10px; color: #1d4ed8; margin-bottom: 5px;">🔄 Alur Pembayaran Konsultasi</div>
        <div style="font-size: 8.5px; color: #374151; line-height: 1.5;">
            <div>1️⃣ User pilih praktisi & jadwal sesi</div>
            <div>2️⃣ Klik <strong>"Pesan & Bayar"</strong></div>
            <div>3️⃣ Popup Midtrans Snap muncul → Pilih QRIS atau Transfer Bank</div>
            <div>4️⃣ Selesaikan pembayaran → webhook otomatis ke sistem</div>
            <div>5️⃣ Konfirmasi → Tautan ruang video call dikirim ke WhatsApp</div>
        </div>
    </div>
</div>

<div class="notice" style="margin-top: 5px;">
    <strong>⚠️ Aktivasi Production:</strong> Sistem sudah siap secara teknis. Untuk mengaktifkan transaksi nyata, masukkan Production Key Midtrans ke Railway Environment Variables: <span class="code">MIDTRANS_SERVER_KEY</span>, <span class="code">MIDTRANS_CLIENT_KEY</span>, dan ubah <span class="code">MIDTRANS_IS_PRODUCTION=true</span>. Daftar di <strong>dashboard.midtrans.com</strong>.
</div>

<div class="doc-footer">
    <div>Hallobun Platform — Dokumentasi Requirement & Arsitektur Sistem</div>
    <div>Halaman 1 dari 3</div>
</div>

<div class="page-break"></div>

<!-- HALAMAN 2: AKUN ADMIN & PRAKTISI -->
<div class="doc-header">
    <img src="{$logoBase64}" alt="Hallobun">
    <div class="doc-meta">
        <div class="badge-conf">RAHASIA & TERBATAS</div>
        <div class="meta-sub">REF: HBN-ADM-LIST-2026/V3</div>
        <div class="meta-sub">Diperbarui: {$date}</div>
    </div>
</div>

<h2>3. Daftar Akun Administrator, Staf & Praktisi Agronom</h2>
<p class="lead">Daftar akun resmi yang terdaftar pada database sistem Hallobun (Production Railway). Seluruh kata sandi default: <span class="pwd">halobun2026</span></p>

<div class="card card-green" style="margin-bottom: 9px;">
    <div style="font-weight: 800; font-size: 10.5px; color: #166534; margin-bottom: 5px;">🔐 Akun Super Administrator Utama</div>
    <table style="margin-bottom: 0;">
        <tr><td style="width: 25%; font-weight: 700; border: none; padding: 2.5px 0;">Nama:</td><td style="border: none; padding: 2.5px 0;"><strong>Admin Hallobun</strong></td></tr>
        <tr><td style="font-weight: 700; border: none; padding: 2.5px 0;">Email Login:</td><td style="border: none; padding: 2.5px 0;"><span class="code">admin@hallobun.com</span></td></tr>
        <tr><td style="font-weight: 700; border: none; padding: 2.5px 0;">Kata Sandi:</td><td style="border: none; padding: 2.5px 0;"><span class="pwd">halobun2026</span></td></tr>
        <tr><td style="font-weight: 700; border: none; padding: 2.5px 0;">Hak Akses:</td><td style="border: none; padding: 2.5px 0;"><span class="badge-admin">admin</span> — Akses Penuh Seluruh Modul Pengelolaan</td></tr>
        <tr><td style="font-weight: 700; border: none; padding: 2.5px 0;">URL Login:</td><td style="border: none; padding: 2.5px 0;"><strong>https://halobun-production.up.railway.app/login</strong></td></tr>
    </table>
</div>

<div class="card" style="margin-bottom: 9px; padding: 8px 10px;">
    <div style="font-weight: 700; font-size: 9.5px; margin-bottom: 3px;">👤 Akun Admin Pribadi (Auto-assigned di Database)</div>
    <div style="font-size: 8.5px; color: #4b5563;">Nama: <strong>Hardadi Nur Aziz</strong> &bull; Role: <span class="badge-admin" style="background:#dcfce7;color:#166534;border-color:#86efac;">admin (Aktif Otomatis)</span> &bull; Dapat langsung mengakses Panel Admin tanpa ganti akun.</div>
</div>

<div style="font-weight: 700; font-size: 10px; color: #374151; margin-bottom: 5px; margin-top: 10px;">📋 Akun Praktisi Agronom Terverifikasi — Kata Sandi: <span class="pwd">halobun2026</span></div>
<table>
    <thead><tr><th style="width:28%">Nama Praktisi</th><th style="width:39%">Email Login</th><th style="width:21%">Bidang Keahlian</th><th style="width:12%">Tarif/Sesi</th></tr></thead>
    <tbody>
        <tr><td><strong>Dr. Budi Santoso, M.Si</strong></td><td><span class="code">dr..budi.santoso..m.si@hallobun.com</span></td><td>Penyakit & Hama Tanaman</td><td>Rp 150.000</td></tr>
        <tr><td><strong>Ir. Siti Rahayu, M.P</strong></td><td><span class="code">ir..siti.rahayu..m.p@hallobun.com</span></td><td>Padi & Palawija</td><td>Rp 120.000</td></tr>
        <tr><td><strong>Prof. Ahmad Fauzi, Ph.D</strong></td><td><span class="code">prof..ahmad.fauzi..ph.d@hallobun.com</span></td><td>Agronomi & Kesuburan Tanah</td><td>Rp 200.000</td></tr>
        <tr><td><strong>Drh. Maya Kusuma</strong></td><td><span class="code">drh..maya.kusuma@hallobun.com</span></td><td>Peternakan Terpadu</td><td>Rp 130.000</td></tr>
        <tr><td><strong>Rahmat Hidayat, S.P</strong></td><td><span class="code">rahmat.hidayat..s.p..m.agr@hallobun.com</span></td><td>Pertanian Organik</td><td>Rp 100.000</td></tr>
        <tr><td><strong>Dr. Lestari Wulandari</strong></td><td><span class="code">dr..lestari.wulandari@hallobun.com</span></td><td>Hortikultura & Buah Tropis</td><td>Rp 175.000</td></tr>
    </tbody>
</table>

<div class="card" style="padding: 6px 10px; background: #fafafa;">
    <div style="font-weight: 700; font-size: 9px; color: #374151;">🌱 Akun Demo Pengguna / Petani</div>
    <div style="font-size: 8.5px; color: #4b5563; margin-top: 2px;">Nama: <strong>Petani Demo</strong> &bull; Email: <span class="code">demo@hallobun.com</span> &bull; Password: <span class="pwd">halobun2026</span> &bull; Role: <span class="code">user</span></div>
</div>

<h2 style="margin-top: 12px;">4. Alur Akses: Guest vs. Login (Hybrid Auth)</h2>
<div class="grid-2">
    <div class="card" style="padding: 8px 10px;">
        <div style="font-weight: 700; font-size: 9.5px; color: #15803d; margin-bottom: 4px;">✅ Bisa Diakses Tanpa Login</div>
        <div style="font-size: 8.5px; color: #374151; line-height: 1.6;">
            • Menjelajahi beranda & seluruh halaman katalog<br>
            • Melihat profil & tarif praktisi agronom<br>
            • Toko Sarana Tani: lihat produk &amp; harga<br>
            • <strong>Pemesanan sarana via WhatsApp</strong> (tanpa akun)<br>
            • Tombol Floating WhatsApp CS 24 jam
        </div>
    </div>
    <div class="card" style="padding: 8px 10px;">
        <div style="font-weight: 700; font-size: 9.5px; color: #1d4ed8; margin-bottom: 4px;">🔐 Memerlukan Login (Seamless Auth Gate)</div>
        <div style="font-size: 8.5px; color: #374151; line-height: 1.6;">
            • Booking konsultasi video call (Jitsi/Zoom)<br>
            • Permohonan kunjungan lahan on-site<br>
            • Permohonan narasumber & bimtek<br>
            • Akses dashboard &amp; riwayat transaksi<br>
            • Masuk ke ruang video meeting privat
        </div>
    </div>
</div>

<div class="doc-footer">
    <div>Hallobun Platform — Daftar Akun, Kredensial & Alur Auth</div>
    <div>Halaman 2 dari 3</div>
</div>

<div class="page-break"></div>

<!-- HALAMAN 3: TUTORIAL OPERASIONAL ADMIN -->
<div class="doc-header">
    <img src="{$logoBase64}" alt="Hallobun">
    <div class="doc-meta">
        <div class="badge-conf" style="background:#e0f2fe;color:#0369a1;">PANDUAN OPERASIONAL</div>
        <div class="meta-sub">REF: HBN-SOP-TUTOR-2026/V3</div>
        <div class="meta-sub">Diperbarui: {$date}</div>
    </div>
</div>

<h2>5. Tutorial Langkah Demi Langkah Pengelolaan Admin</h2>

<div class="grid-2">
    <div class="card" style="padding: 7px 9px; margin-bottom: 7px;">
        <div class="step"><div class="step-n">01</div><div class="step-t">Masuk ke Panel Admin</div><div class="step-d">1. Buka <strong>halobun-production.up.railway.app/login</strong>.<br>2. Login dengan <span class="code">admin@hallobun.com</span> / <span class="pwd">halobun2026</span>.<br>3. Klik tombol <strong>⚙️ Panel Admin</strong> pada banner dashboard.</div></div>
    </div>
    <div class="card" style="padding: 7px 9px; margin-bottom: 7px;">
        <div class="step"><div class="step-n">02</div><div class="step-t">Verifikasi Pembayaran & Sesi Konsultasi</div><div class="step-d">1. Klik menu <strong>"Konsultasi / Booking"</strong> (<span class="code">/admin/bookings</span>).<br>2. Periksa status pembayaran Midtrans (QRIS / VA).<br>3. Ubah status booking menjadi <strong>Confirmed</strong> jika sudah lunas.<br>4. Klik <strong>"Buka Meeting Room"</strong> untuk pantau sesi video call.</div></div>
    </div>
    <div class="card" style="padding: 7px 9px; margin-bottom: 7px;">
        <div class="step"><div class="step-n">03</div><div class="step-t">Menjadwalkan Kunjungan Lahan On-Site</div><div class="step-d">1. Klik menu <strong>"Kunjungan Lahan"</strong> (<span class="code">/admin/kunjungan</span>).<br>2. Tinjau detail kebun: luas, jenis tanaman, alamat, keluhan.<br>3. Hubungi pemohon via WhatsApp untuk konfirmasi tanggal.<br>4. Ubah status ke <strong>Diterima / Dijadwalkan</strong> + catat nama agronom.</div></div>
    </div>
    <div class="card" style="padding: 7px 9px; margin-bottom: 7px;">
        <div class="step"><div class="step-n">04</div><div class="step-t">Proses Permohonan Narasumber & Bimtek</div><div class="step-d">1. Klik menu <strong>"Undang Narasumber"</strong> (<span class="code">/admin/narsum</span>).<br>2. Tinjau tema, estimasi peserta, dan waktu pelaksanaan.<br>3. Tentukan pemateri yang relevan dan ubah status ke <strong>Disetujui</strong>.</div></div>
    </div>
    <div class="card" style="padding: 7px 9px; margin-bottom: 7px;">
        <div class="step"><div class="step-n">05</div><div class="step-t">Kelola Produk Toko Sarana Tani</div><div class="step-d">1. Klik menu <strong>"Toko Sarana"</strong> (<span class="code">/admin/sarana</span>).<br>2. <strong>Tambah:</strong> Klik + Tambah Produk, isi nama, harga, stok, kategori.<br>3. <strong>Edit:</strong> Klik Edit untuk update stok/harga promo/harga coret.<br>4. <strong>Hapus:</strong> Klik Hapus bila produk tidak lagi dijual.</div></div>
    </div>
    <div class="card" style="padding: 7px 9px; margin-bottom: 7px;">
        <div class="step"><div class="step-n">06</div><div class="step-t">Aktifkan Pembayaran Production (Midtrans)</div><div class="step-d">1. Daftar / login ke <strong>dashboard.midtrans.com</strong>.<br>2. Ambil <strong>Production Server Key</strong> & <strong>Client Key</strong>.<br>3. Masukkan ke Railway Env: <span class="code">MIDTRANS_SERVER_KEY</span>, <span class="code">MIDTRANS_CLIENT_KEY</span>.<br>4. Set <span class="code">MIDTRANS_IS_PRODUCTION=true</span> → QRIS & VA aktif.</div></div>
    </div>
</div>

<div class="card" style="padding: 7px 9px;">
    <div class="step"><div class="step-n">07</div><div class="step-t">Mengatur Ketersediaan & Tarif Praktisi Agronom</div>
    <div class="step-d">1. Klik menu <strong>"Praktisi / Pakar"</strong> (<span class="code">/admin/konsultan</span>).<br>2. Toggle ON/OFF ketersediaan praktisi yang sedang berhalangan/cuti.<br>3. Update tarif sesi, bidang spesialisasi, dan bio profil agronom.</div></div>
</div>

<div class="notice">
    <strong>⚠️ SOP Keamanan Sistem:</strong><br>
    1. <strong>Kata Sandi Profesional:</strong> Password resmi sistem: <span class="pwd">halobun2026</span>. Simpan dokumen ini di tempat aman dan jangan bagikan kepada pihak tidak berwenang.<br>
    2. <strong>Update Password Mandiri:</strong> Admin dan praktisi dapat mengubah kata sandi kapan saja via menu <em>Profil &gt; Ubah Password</em>.<br>
    3. <strong>Log Out:</strong> Selalu logout setelah selesai bekerja, terutama di perangkat bersama.
</div>

<div class="doc-footer">
    <div>&copy; 2026 Hallobun Indonesia &bull; PT Hallobun Solusi Perkebunan Nusantara</div>
    <div>Halaman 3 dari 3</div>
</div>

</body>
</html>
HTML;

$tmpProfileH = sys_get_temp_dir() . '/chrome_hb_handbook_' . uniqid();
@mkdir($tmpProfileH, 0777, true);

$htmlPathHandbook = __DIR__ . '/temp_handbook.html';
file_put_contents($htmlPathHandbook, $htmlHandbook);

$pdfPathHandbook = __DIR__ . '/../public/docs/Panduan_Lengkap_Akun_Admin_Hallobun.pdf';
$cmdHandbook = escapeshellarg($chromePath) . ' --headless --disable-gpu --no-first-run --no-default-browser-check'
    . ' --user-data-dir=' . escapeshellarg($tmpProfileH)
    . ' --print-to-pdf=' . escapeshellarg($pdfPathHandbook)
    . ' --no-pdf-header-footer '
    . escapeshellarg($htmlPathHandbook);
exec($cmdHandbook, $outH, $retH);

if ($retH === 0 && file_exists($pdfPathHandbook)) {
    echo "SUCCESS: Handbook PDF → " . $pdfPathHandbook . " (" . filesize($pdfPathHandbook) . " bytes)\n";
} else {
    echo "ERROR: Failed handbook PDF\n";
}

// ══════════════════════════════════════════════════════════════════════════════
// 2. CREDENTIAL SHEET (1 HALAMAN RINGKAS — VERSI V3)
// ══════════════════════════════════════════════════════════════════════════════
$htmlSheet = <<<HTML
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Informasi Akun & Akses Administrator Hallobun</title>
<style>
    @page { size: A4; margin: 12mm 15mm 12mm 15mm; }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; color: #1f2937; line-height: 1.35; background: #fff; font-size: 9.8px; }
    .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #16a34a; padding-bottom: 7px; margin-bottom: 11px; }
    .header img { height: 33px; width: auto; }
    .header-right { text-align: right; }
    .badge-conf { display: inline-block; background: #fee2e2; color: #991b1b; font-size: 7.5px; font-weight: 800; padding: 2px 7px; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 1px; }
    .date-txt { font-size: 8px; color: #6b7280; }
    h1 { font-size: 17px; font-weight: 800; color: #14532d; margin-bottom: 2px; }
    p.subtitle { font-size: 9px; color: #4b5563; margin-bottom: 11px; }
    .section-title { font-size: 10.5px; font-weight: 700; color: #15803d; margin-top: 10px; margin-bottom: 5px; display: flex; align-items: center; gap: 5px; }
    .section-title::before { content: ""; display: inline-block; width: 3.5px; height: 12px; background: #16a34a; border-radius: 2px; }
    .cred-box { background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 7px; padding: 9px 12px; margin-bottom: 10px; }
    .cred-title { font-weight: 800; font-size: 10.5px; color: #166534; margin-bottom: 6px; }
    .cred-row { display: flex; padding: 3px 0; border-bottom: 1px dashed #bbf7d0; font-size: 9.5px; }
    .cred-row:last-child { border-bottom: none; padding-bottom: 0; }
    .cred-label { width: 130px; font-weight: 600; color: #374151; }
    .code { font-family: ui-monospace, Menlo, Consolas, monospace; background: #fff; border: 1px solid #d1d5db; padding: 1.5px 5px; border-radius: 3.5px; font-weight: 700; color: #111827; font-size: 9px; }
    .pwd { font-family: ui-monospace, Menlo, Consolas, monospace; background: #fef08a; border: 1px solid #fde047; padding: 1.5px 7px; border-radius: 3.5px; font-weight: 800; color: #854d0e; font-size: 10px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 9px; font-size: 9px; }
    th { background: #f8fafc; color: #334155; font-weight: 700; text-align: left; padding: 4.5px 8px; border: 1px solid #e2e8f0; font-size: 8px; text-transform: uppercase; letter-spacing: 0.4px; }
    td { padding: 4px 8px; border: 1px solid #e2e8f0; color: #334155; }
    tr:nth-child(even) td { background: #f8fafc; }
    .step-box { display: flex; gap: 7px; margin-bottom: 4px; align-items: flex-start; }
    .step-num { width: 16px; height: 16px; background: #16a34a; color: #fff; border-radius: 3px; display: flex; align-items: center; justify-content: center; font-size: 8px; font-weight: 800; flex-shrink: 0; }
    .step-desc { font-size: 8.8px; color: #374151; line-height: 1.3; }
    .pay-box { background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px; padding: 8px 10px; margin-top: 10px; }
    .pay-title { font-weight: 800; font-size: 10px; color: #1e40af; margin-bottom: 5px; }
    .pay-item { display: inline-block; background: #fff; border: 1px solid #bfdbfe; color: #1d4ed8; font-weight: 700; font-size: 8px; padding: 2px 7px; border-radius: 4px; margin: 2px 2px 0 0; }
    .notice-box { background: #fefce8; border: 1px solid #fef08a; border-radius: 5px; padding: 7px 10px; margin-top: 9px; font-size: 8px; color: #854d0e; }
    .notice-box h4 { font-size: 8.5px; color: #713f12; margin-bottom: 2px; font-weight: 700; }
    .footer { margin-top: 9px; border-top: 1px solid #e5e7eb; padding-top: 5px; display: flex; justify-content: space-between; font-size: 7.5px; color: #9ca3af; }
</style>
</head>
<body>

<div class="header">
    <img src="{$logoBase64}" alt="Hallobun">
    <div class="header-right">
        <div class="badge-conf">DOKUMEN RAHASIA — V3</div>
        <div class="date-txt">REF: HBN-ADM-CRED-2026/V3</div>
        <div class="date-txt">Diperbarui: {$date}</div>
    </div>
</div>

<h1>Informasi Akun & Akses Administrator</h1>
<p class="subtitle">Kredensial login, metode pembayaran, alur pemesanan, dan panduan cepat pengelolaan platform Hallobun — semua dalam satu halaman.</p>

<div class="cred-box">
    <div class="cred-title">🔐 Kredensial Resmi Akun Super Administrator</div>
    <div class="cred-row"><div class="cred-label">Nama Akun:</div><div><strong>Admin Hallobun</strong> (atau akun <strong>Hardadi Nur Aziz</strong>)</div></div>
    <div class="cred-row"><div class="cred-label">Alamat Email:</div><div><span class="code">admin@hallobun.com</span></div></div>
    <div class="cred-row"><div class="cred-label">Kata Sandi Resmi:</div><div><span class="pwd">halobun2026</span></div></div>
    <div class="cred-row"><div class="cred-label">Hak Akses:</div><div><strong>Super Administrator</strong> — Akses Penuh Seluruh Modul</div></div>
    <div class="cred-row"><div class="cred-label">URL Login:</div><div><strong>https://halobun-production.up.railway.app/login</strong></div></div>
</div>

<div class="section-title">💳 Sistem Pembayaran (Midtrans Snap)</div>
<div class="pay-box">
    <div class="pay-title">Metode yang Tersedia — Pilih saat Checkout Konsultasi:</div>
    <span class="pay-item">📱 QRIS</span>
    <span class="pay-item">🏦 BCA Virtual Account</span>
    <span class="pay-item">🏦 BNI Virtual Account</span>
    <span class="pay-item">🏦 BRI Virtual Account</span>
    <span class="pay-item">🏦 Mandiri Virtual Account</span>
    <span class="pay-item">💳 Kartu Kredit/Debit</span>
    <div style="margin-top: 6px; font-size: 8.5px; color: #1e40af;">🔒 Semua transaksi diproses aman oleh <strong>Midtrans</strong> (PCI DSS Certified). Biaya admin: 2% (min. Rp 2.000). | Pemesanan Sarana Tani: Langsung via WhatsApp tanpa perlu akun.</div>
</div>

<div class="section-title">🌐 Tautan Akses Sistem (Production)</div>
<table>
    <thead><tr><th style="width:25%">Halaman</th><th style="width:53%">URL</th><th style="width:22%">Aksesibilitas</th></tr></thead>
    <tbody>
        <tr><td><strong>Login</strong></td><td><span class="code">https://halobun-production.up.railway.app/login</span></td><td>Publik</td></tr>
        <tr><td><strong>Panel Admin</strong></td><td><span class="code">https://halobun-production.up.railway.app/admin/dashboard</span></td><td><strong style="color:#16a34a;">Khusus Role Admin</strong></td></tr>
        <tr><td><strong>Dashboard User</strong></td><td><span class="code">https://halobun-production.up.railway.app/dashboard</span></td><td>User & Admin</td></tr>
        <tr><td><strong>Beranda</strong></td><td><span class="code">https://halobun-production.up.railway.app/</span></td><td>Publik (Tanpa Login)</td></tr>
    </tbody>
</table>

<div class="section-title">🛠️ Modul Pengelolaan Admin</div>
<table>
    <thead><tr><th style="width:22%">Modul</th><th style="width:50%">Fungsi</th><th style="width:28%">Aksi Utama Admin</th></tr></thead>
    <tbody>
        <tr><td><strong>Konsultasi & Booking</strong></td><td>Kelola sesi video call, verifikasi pembayaran Midtrans (QRIS/VA), pantau status transaksi.</td><td>Verifikasi bayar, confirm sesi, buka meeting</td></tr>
        <tr><td><strong>Kunjungan Lahan</strong></td><td>Survei fisik kebun on-site, penugasan tim agronom lapangan.</td><td>Jadwalkan tim, ubah status permohonan</td></tr>
        <tr><td><strong>Narasumber & Bimtek</strong></td><td>Validasi undangan pemateri workshop, seminar, dan bimtek poktan.</td><td>Setujui undangan, penugasan pemateri</td></tr>
        <tr><td><strong>Sarana Tani</strong></td><td>Katalog benih, pupuk, pestisida, dan alat kebun. Pemesanan via WhatsApp (bebas login).</td><td>CRUD produk, update harga/stok</td></tr>
        <tr><td><strong>Praktisi Agronom</strong></td><td>Profil, ketersediaan status, dan tarif per sesi konsultasi.</td><td>Toggle aktif/nonaktif, update tarif</td></tr>
    </tbody>
</table>

<div class="section-title">📋 Panduan Cepat 4 Langkah Masuk Panel Admin</div>
<div class="step-box"><div class="step-num">1</div><div class="step-desc">Buka <strong>https://halobun-production.up.railway.app/login</strong></div></div>
<div class="step-box"><div class="step-num">2</div><div class="step-desc">Email: <span class="code">admin@hallobun.com</span> &nbsp;|&nbsp; Password: <span class="pwd">halobun2026</span> → Klik <strong>Masuk</strong></div></div>
<div class="step-box"><div class="step-num">3</div><div class="step-desc">Klik tombol <strong>⚙️ Panel Admin</strong> pada banner dashboard atau navigasi ke <strong>/admin/dashboard</strong></div></div>
<div class="step-box"><div class="step-num">4</div><div class="step-desc">Panel Admin aktif — kelola seluruh modul operasional platform Hallobun</div></div>

<div class="notice-box">
    <h4>⚠️ Keamanan & Aktivasi Production:</h4>
    <p>1. Password profesional resmi: <strong>halobun2026</strong>. Jangan bagikan dokumen ini ke pihak umum.<br>
    2. Aktifkan QRIS & Transfer Bank nyata: isi Midtrans Production Key di Railway → <span class="code">MIDTRANS_IS_PRODUCTION=true</span>.<br>
    3. Selalu <em>Log Out</em> setelah selesai bekerja di perangkat bersama.</p>
</div>

<div class="footer">
    <div>&copy; 2026 Hallobun Indonesia &bull; PT Hallobun Solusi Perkebunan Nusantara</div>
    <div>Dokumen Resmi &bull; Rahasia & Terbatas &bull; V3</div>
</div>

</body>
</html>
HTML;

$tmpProfileS = sys_get_temp_dir() . '/chrome_hb_sheet_' . uniqid();
@mkdir($tmpProfileS, 0777, true);

$htmlPathSheet = __DIR__ . '/temp_sheet.html';
file_put_contents($htmlPathSheet, $htmlSheet);

$pdfPathSheet = __DIR__ . '/../public/docs/Akun_Admin_Hallobun.pdf';
$cmdSheet = escapeshellarg($chromePath) . ' --headless --disable-gpu --no-first-run --no-default-browser-check'
    . ' --user-data-dir=' . escapeshellarg($tmpProfileS)
    . ' --print-to-pdf=' . escapeshellarg($pdfPathSheet)
    . ' --no-pdf-header-footer '
    . escapeshellarg($htmlPathSheet);
exec($cmdSheet, $outS, $retS);

if ($retS === 0 && file_exists($pdfPathSheet)) {
    echo "SUCCESS: Credential Sheet PDF → " . $pdfPathSheet . " (" . filesize($pdfPathSheet) . " bytes)\n";
} else {
    echo "ERROR: Failed credential sheet PDF\n";
}

@unlink($htmlPathHandbook);
@unlink($htmlPathSheet);
echo "DONE.\n";
