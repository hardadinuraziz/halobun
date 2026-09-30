<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use App\Models\Booking;
use App\Models\Sarana;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $konsultanFeatured = Konsultan::active()
            ->with('user')
            ->orderByDesc('rating')
            ->take(6)
            ->get();

        $totalKonsultan    = Konsultan::active()->count();
        $totalKonsultasi   = Booking::where('status', 'completed')->count();
        $totalPekebun      = \App\Models\User::count() + 450; // Total ekosistem pekebun
        $saranaFeatured    = Sarana::active()->featured()->take(4)->get();
        if ($saranaFeatured->isEmpty()) {
            $saranaFeatured = Sarana::active()->take(4)->get();
        }

        $layananList = [
            [
                'icon'        => '💬',
                'title'       => 'Konsultasi Online',
                'desc'        => 'Konsultasi langsung dengan pakar agrikultur via video call & WhatsApp kapanpun.',
                'url'         => route('konsultasi.index'),
                'color'       => 'emerald',
            ],
            [
                'icon'        => '🎤',
                'title'       => 'Undang Narasumber',
                'desc'        => 'Undang pakar pertanian untuk seminar, penyuluhan, atau workshop komunitas.',
                'url'         => route('narsum.index'),
                'color'       => 'blue',
            ],
            [
                'icon'        => '🚜',
                'title'       => 'Kunjungan Offline',
                'desc'        => 'Tim ahli kami siap datang langsung ke kebun atau lahan Anda untuk inspeksi.',
                'url'         => route('kunjungan.index'),
                'color'       => 'amber',
            ],
            [
                'icon'        => '🌿',
                'title'       => 'Sarana Pertanian',
                'desc'        => 'Produk budidaya teruji: bibit unggul, pupuk organik, nutrisi tanaman & alat kebun.',
                'url'         => route('sarana.index'),
                'color'       => 'lime',
            ],
        ];

        // JuruTani inspired: Live Commodity & Market Prices (Harga Pangan Terkini)
        $hargaPangan = [
            [
                'komoditas' => 'Cabai Rawit Merah',
                'kategori'  => 'Hortikultura',
                'icon'      => '🌶️',
                'harga'     => 42500,
                'satuan'    => 'kg',
                'perubahan' => '+3.2%',
                'trend'     => 'up',
                'update'    => 'Hari ini, 08:30 WIB',
                'wilayah'   => 'Rata-rata Nasional'
            ],
            [
                'komoditas' => 'Bawang Merah Brebes',
                'kategori'  => 'Hortikultura',
                'icon'      => '🧅',
                'harga'     => 34000,
                'satuan'    => 'kg',
                'perubahan' => '-1.8%',
                'trend'     => 'down',
                'update'    => 'Hari ini, 08:30 WIB',
                'wilayah'   => 'Pasar Induk'
            ],
            [
                'komoditas' => 'Beras Medium Pandan',
                'kategori'  => 'Pangan Pokok',
                'icon'      => '🌾',
                'harga'     => 14500,
                'satuan'    => 'kg',
                'perubahan' => '0.0%',
                'trend'     => 'stable',
                'update'    => 'Hari ini, 08:30 WIB',
                'wilayah'   => 'Stabil'
            ],
            [
                'komoditas' => 'Sayur Pakcoy Segar',
                'kategori'  => 'Sayuran',
                'icon'      => '🥬',
                'harga'     => 8500,
                'satuan'    => 'kg',
                'perubahan' => '+4.1%',
                'trend'     => 'up',
                'update'    => 'Hari ini, 08:30 WIB',
                'wilayah'   => 'Segar Petani'
            ],
            [
                'komoditas' => 'Tomat Buah Unggul',
                'kategori'  => 'Hortikultura',
                'icon'      => '🍅',
                'harga'     => 12000,
                'satuan'    => 'kg',
                'perubahan' => '-2.4%',
                'trend'     => 'down',
                'update'    => 'Hari ini, 08:30 WIB',
                'wilayah'   => 'Panen Raya'
            ],
            [
                'komoditas' => 'Jagung Manis Pipil',
                'kategori'  => 'Pangan Pokok',
                'icon'      => '🌽',
                'harga'     => 9500,
                'satuan'    => 'kg',
                'perubahan' => '+1.5%',
                'trend'     => 'up',
                'update'    => 'Hari ini, 08:30 WIB',
                'wilayah'   => 'Pasar Tradisional'
            ],
        ];

        // JuruTani inspired: Edukasi & Berita Pertanian Terkini
        $beritaTani = [
            [
                'id'       => 1,
                'tag'      => 'Pengendalian Hama',
                'color'    => 'emerald',
                'title'    => 'Cara Mengatasi Kutu Putih & Ulat Grayak Tanpa Pestisida Kimia',
                'excerpt'  => 'Gunakan ramuan pestisida nabati daun tembakau dan minyak nimba yang aman untuk sayuran organik dan tanaman hias pekarangan.',
                'author'   => 'Dr. Ir. Suwandi, M.Si',
                'date'     => '28 Sep 2026',
                'read_time'=> '4 mnt baca',
                'image'    => '/images/layanan/konsultasi.jpg',
            ],
            [
                'id'       => 2,
                'tag'      => 'Teknik Pemupukan',
                'color'    => 'blue',
                'title'    => 'Panduan Aplikasi Pupuk Organik Cair (POC) untuk Hasil Panen Maksimal',
                'excerpt'  => 'Ketahui rasio pengenceran air serta waktu terbaik penyemprotan stomata daun pada pagi hari sebelum sinar matahari terik.',
                'author'   => 'Bayu Pratama, S.P.',
                'date'     => '26 Sep 2026',
                'read_time'=> '5 mnt baca',
                'image'    => '/images/layanan/produksi.jpg',
            ],
            [
                'id'       => 3,
                'tag'      => 'Urban Farming',
                'color'    => 'amber',
                'title'    => 'Strategi Kebun Sayur Vertikal di Rooftop dan Pekarangan Sempit',
                'excerpt'  => 'Memanfaatkan instalasi pipa talang dan pot susun vertikal untuk menanam selada, seledri, dan mint secara mandiri.',
                'author'   => 'Dewi Lestari, S.Pt',
                'date'     => '24 Sep 2026',
                'read_time'=> '3 mnt baca',
                'image'    => '/images/layanan/pelatihan.jpg',
            ],
        ];

        // Testimonial Pengguna
        $testimonials = [
            [
                'name'     => 'H. Ahmad Syafi\'i',
                'role'     => 'Petani Cabai & Melon, Magelang',
                'avatar'   => '👨‍🌾',
                'rating'   => 5,
                'comment'  => 'Konsultasi video call di Hallobun sangat solutif. Daun cabai yang kriting langsung terdiagnosa kutu kebul dan sembuh setelah ikuti dosis rekomendasi pakar.',
                'verified' => true,
            ],
            [
                'name'     => 'Rina Kusuma',
                'role'     => 'Urban Farmer & Hidroponik, Tangerang',
                'avatar'   => '👩‍🌾',
                'rating'   => 5,
                'comment'  => 'Suka sekali dengan konsep temanya yang asri dan praktisi yang ramah. Sekarang kebun selada rooftop saya bebas busuk akar berkat bimbingan rutin.',
                'verified' => true,
            ],
            [
                'name'     => 'Bambang Triyono',
                'role'     => 'Ketua Kelompok Tani Mandiri, Boyolali',
                'avatar'   => '🌾',
                'rating'   => 5,
                'comment'  => 'Fitur undang narsum sangat mempermudah kelompok kami membuat workshop pemupukan berimbang. Materinya aplikatif dan pendampingannya berkelanjutan.',
                'verified' => true,
            ],
        ];

        return view('home.index', compact(
            'konsultanFeatured', 'totalKonsultan', 'totalKonsultasi', 'totalPekebun',
            'saranaFeatured', 'layananList', 'hargaPangan', 'beritaTani', 'testimonials'
        ));
    }

    public function layanan()
    {
        $services = [
            [
                'id'          => 'crop-production',
                'badge'       => 'Siklus Lengkap',
                'icon'        => '🌾',
                'title'       => 'Produksi Tanaman & Hortikultura',
                'title_en'    => 'Crop Production & Horticulture',
                'description' => 'Pendampingan terpadu dari awal persiapan media tanam, pemupukan berimbang, manajemen irigasi, hingga panen untuk tanaman sayur, buah tropis, cabai, padi, dan tanaman hias pekarangan.',
                'features'    => [
                    'Kalender tanam & pemupukan presisi',
                    'Manajemen Pengendalian Hama Terpadu (PHT)',
                    'Teknik budidaya organik & hidroponik modern',
                    'Optimalisasi kualitas dan kuantitas hasil panen'
                ],
                'action_text' => 'Konsultasikan Budidaya',
                'action_url'  => route('konsultasi.index'),
                'color'       => 'emerald',
            ],
            [
                'id'          => 'consulting',
                'badge'       => 'Populer & Cepat',
                'icon'        => '💬',
                'title'       => 'Konsultasi Agrikultur & Agronomi',
                'title_en'    => 'Agricultural Consulting',
                'description' => 'Konsultasi interaktif 1-on-1 bersama pakar agronomis berlisensi via video call untuk diagnosa instan penyakit tanaman, rekomendasi nutrisi spesifik, dan pencegahan gagal panen.',
                'features'    => [
                    'Sesi video call tatap muka via Jitsi Meet',
                    'Diagnosa foto hama & daun menguning secara mendalam',
                    'Resep dosis pupuk & nutrisi sesuai jenis tanah',
                    'Notifikasi & ringkasan terkirim langsung ke WhatsApp'
                ],
                'action_text' => 'Pilih Konsultan Online',
                'action_url'  => route('konsultasi.index'),
                'color'       => 'emerald',
            ],
            [
                'id'          => 'training',
                'badge'       => 'Edukasi & Praktik',
                'icon'        => '🎓',
                'title'       => 'Pelatihan & Lokakarya Pekebun',
                'title_en'    => 'Farmer & Community Training',
                'description' => 'Program pelatihan praktis untuk kelompok tani (poktan), komunitas urban farming, institusi pendidikan, dan program CSR korporasi dengan kurikulum aplikatif.',
                'features'    => [
                    'Pelatihan langsung (on-site) atau webinar online',
                    'Praktik pembuatan kompos hayati & pestisida nabati',
                    'Modul pembelajaran terstruktur & e-sertifikat resmi',
                    'Sesi tanya jawab interaktif bersama narasumber senior'
                ],
                'action_text' => 'Undang Narasumber',
                'action_url'  => route('narsum.index'),
                'color'       => 'blue',
            ],
            [
                'id'          => 'field-visit',
                'badge'       => 'On-Site Langsung',
                'icon'        => '🚜',
                'title'       => 'Kunjungan Lapangan & Uji Lahan',
                'title_en'    => 'On-Site Field Visit & Soil Inspection',
                'description' => 'Tim agronomis kami hadir langsung ke lahan, pekarangan, kebun buah, atau greenhouse Anda untuk evaluasi fisik, uji keasaman (pH) tanah, dan pemetaan zonasi tanam.',
                'features'    => [
                    'Inspeksi langsung kondisi tanaman di lapangan',
                    'Pengukuran pH, kelembapan, dan kepadatan tanah',
                    'Penyusunan denah tata kelola air dan irigasi',
                    'Laporan komprehensif tertulis pasca kunjungan'
                ],
                'action_text' => 'Pesan Kunjungan Kebun',
                'action_url'  => route('kunjungan.index'),
                'color'       => 'amber',
            ],
            [
                'id'          => 'seed-supply',
                'badge'       => 'Tersertifikasi',
                'icon'        => '🪴',
                'title'       => 'Penyediaan Benih & Sarana Organik',
                'title_en'    => 'Seed & Eco-Friendly Inputs Supply',
                'description' => 'Katalog sarana kebun terlengkap: benih unggul dengan persentase daya kecambah tinggi, pupuk organik hayati, nutrisi AB Mix, dan alat berkebun berkualitas.',
                'features'    => [
                    'Benih bersertifikasi bebas penyakit benih',
                    'Pupuk organik ramah lingkungan & hayati mikroba',
                    'Media tanam siap pakai bebas patogen',
                    'Pengiriman aman ke seluruh wilayah Indonesia'
                ],
                'action_text' => 'Lihat Katalog Sarana',
                'action_url'  => route('sarana.index'),
                'color'       => 'lime',
            ],
            [
                'id'          => 'livestock',
                'badge'       => 'Integrated Farming',
                'icon'        => '🐄',
                'title'       => 'Peternakan Terpadu & Pakan Alami',
                'title_en'    => 'Livestock & Feed Formulation',
                'description' => 'Menerapkan siklus pertanian sirkular (zero-waste) yang menggabungkan kebun dengan ternak (unggas, domba, kambing, sapi) melalui formulasi pakan fermentasi mandiri.',
                'features'    => [
                    'Formulasi pakan hemat biaya berbasis bahan lokal',
                    'Pengolahan feses/urin menjadi biogas & pupuk cair',
                    'Standar sanitasi dan biosafety kandang sehat',
                    'Siklus nutrisi tertutup dari kebun kembali ke kebun'
                ],
                'action_text' => 'Konsultasikan Peternakan',
                'action_url'  => route('konsultasi.index'),
                'color'       => 'amber',
            ],
            [
                'id'          => 'rd-testing',
                'badge'       => 'Laboratorium & Ilmiah',
                'icon'        => '🔬',
                'title'       => 'Riset, Analisis Tanah & Formulasi',
                'title_en'    => 'Agricultural R&D & Soil Testing',
                'description' => 'Uji laboratorium kadar hara tanah (N, P, K, C-Organik), uji efikasi produk pertanian hayati, serta formulasi pupuk khusus untuk perkebunan luas dan industri agribisnis.',
                'features'    => [
                    'Uji laboratorium kimia & biologi tanah lengkap',
                    'Rekomendasi takaran pemupukan presisi per hektar',
                    'Uji efikasi lapangan skala percontohan (*demo plot*)',
                    'Laporan analisis ilmiah untuk standarisasi sertifikasi'
                ],
                'action_text' => 'Diskusikan Riset & Uji',
                'action_url'  => route('kunjungan.index'),
                'color'       => 'blue',
            ],
        ];

        $adminPhone = config('hallobun.admin_phone', '081234567890');

        return view('layanan.index', compact('services', 'adminPhone'));
    }
}

