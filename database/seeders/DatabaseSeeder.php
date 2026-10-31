<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;
use App\Models\Sarana;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Admin ───────────────────────────────────────
        User::updateOrCreate(
            ['email' => 'admin@hallobun.com'],
            [
                'name'     => 'Admin Hallobun',
                'password' => Hash::make('halobun2026'),
                'role'     => 'admin',
                'phone'    => '081234567890',
                'email_verified_at' => now(),
            ]
        );

        // ─── Konsultan (Data Praktisi Halobun Asli) ────────────────────────
        $praktisiData = [
            [
                'name'          => 'Kismatullaili, S.P.',
                'email'         => 'kismatullaili@gmail.com',
                'phone'         => '0882-2005-9970',
                'spesialisasi'  => 'Agribisnis & Pendamping Budidaya Hortikultura & Tanaman Pangan',
                'klasifikasi'   => 'umum',
                'bio'           => 'Ahli Agribisnis dan Pendamping Budidaya Hortikultura & Tanaman Pangan dari Brebes, Jawa Tengah. Layanan meliputi: konsultasi budidaya hulu-hilir (padi, jagung, cabai, terong, sawi, pakcoy, pepaya, pisang), pengendalian OPT terpadu, manajemen pasca panen & pemasaran, inovasi & efisiensi usaha tani, serta pendampingan petani berbasis lapangan di area Brebes & sekitarnya.',
                'harga'         => 150000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/kismatullaili.jpg',
            ],
            [
                'name'          => 'Chairani, S.P.',
                'email'         => 'chairani.sp@hallobun.com',
                'phone'         => '081200000001',
                'spesialisasi'  => 'Budidaya Buah-Buahan Umum',
                'klasifikasi'   => 'umum',
                'bio'           => 'Praktisi pertanian dengan keahlian di bidang budidaya buah-buahan umum. Siap membantu petani dan penghobi berkebun untuk mengoptimalkan hasil tanaman buah mereka.',
                'harga'         => 150000,
                'rating'        => 4.8,
                'foto'          => '/images/praktisi/chairani.jpg',
            ],
            [
                'name'          => 'Maria Ulfa, S.P.',
                'email'         => 'maria.ulfa.sp@hallobun.com',
                'phone'         => '081200000002',
                'spesialisasi'  => 'Perbenihan Hortikultura, Hidroponik & Pupuk Organik',
                'klasifikasi'   => 'umum',
                'bio'           => 'Praktisi hortikultura dengan keahlian di bidang perbenihan hortikultura, cara merawat tanaman hortikultura, hidroponik pakcoy, dan pembuatan pupuk organik. Berpengalaman mendampingi petani hortikultura pemula maupun berpengalaman.',
                'harga'         => 150000,
                'rating'        => 4.8,
                'foto'          => '/images/praktisi/maria_ulfa.jpg',
            ],
            [
                'name'          => 'Gesang Arul Fadila, S.P.',
                'email'         => 'gesang.arul@hallobun.com',
                'phone'         => '081200000003',
                'spesialisasi'  => 'Sosiologi Pertanian & Budidaya Pertanian',
                'klasifikasi'   => 'umum',
                'bio'           => 'Praktisi sosiologi pertanian dan budidaya tanaman. Berpengalaman dalam pengembangan teknik budidaya pertanian modern, pemberdayaan petani, dan transformasi budaya pertanian yang produktif dan berkelanjutan.',
                'harga'         => 150000,
                'rating'        => 4.7,
                'foto'          => '/images/praktisi/gesang.jpg',
            ],
            [
                'name'          => 'Dhinda Nururrahmah, S.P.',
                'email'         => 'dhinda.nururrahmah@hallobun.com',
                'phone'         => '081200000004',
                'spesialisasi'  => 'Agroekoteknologi & Manajemen Sumber Daya Lahan',
                'klasifikasi'   => 'umum',
                'bio'           => 'Spesialis Agroekoteknologi (Manajemen Sumber Daya Lahan). Layanan meliputi: budidaya tanaman hortikultura (khusus tomat, melon, labu kuning, semangka), diagnosis kesehatan & kesuburan tanah, manajemen tanah berkelanjutan, dan sistem pertanian lestari.',
                'harga'         => 150000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/dhinda.jpg',
            ],
            [
                'name'          => 'Febriandi Alfredo Sidabukke, S.P.',
                'email'         => 'febriandi.alfredo@hallobun.com',
                'phone'         => '081200000005',
                'spesialisasi'  => 'Hama & Penyakit Tanaman, Pestisida & Proteksi Tanaman',
                'klasifikasi'   => 'umum',
                'bio'           => 'Ahli Proteksi Tanaman, spesialis penanganan hama dan penyakit tanaman, manajemen pestisida, serta pest control terpadu untuk perkebunan dan pertanian komersial.',
                'harga'         => 150000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/febriandi.jpg',
            ],
            [
                'name'          => 'Ahmad Suhaemi, S.TP',
                'email'         => 'ahmad.suhaemi@hallobun.com',
                'phone'         => '081200000006',
                'spesialisasi'  => 'Sertifikasi Organik & Perkebunan Kelapa (Coconut Plantation & Farmer)',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Praktisi spesialis sertifikasi organik dengan pengalaman sebagai Organic Certification Officer & Internal Control System. Memiliki keahlian mendalam pada standar sertifikasi organik perkebunan kelapa (Coconut Plantation & Farmer) serta pendampingan budidaya petani berkelanjutan.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/ahmad_suhaemi.jpg',
            ],
            [
                'name'          => 'Azhar Mahir, S.P.',
                'email'         => 'azhar.mahir@hallobun.com',
                'phone'         => '081200000011',
                'spesialisasi'  => 'Budidaya Kakao & Pengelolaan Pupuk Organik (Kompos)',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Praktisi spesialis budidaya kakao dan formulasi pupuk organik kompos. Berpengalaman dalam pengelolaan kebun kakao produktif, rehabilitasi tanaman kakao, pemupukan organik terpadu, dan peningkatan mutu biji kakao.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/azhar_mahir.jpg',
            ],
            [
                'name'          => 'Edi Sapwanto, S.T.',
                'email'         => 'edi.sapwanto@hallobun.com',
                'phone'         => '081200000012',
                'spesialisasi'  => 'Tanaman Perkebunan, Rempah & Penangkaran Bibit',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Petani rempah dan praktisi penangkaran bibit tanaman perkebunan. Berpengalaman dalam teknik pembibitan unggul, budidaya tanaman perkebunan & rempah, serta manajemen pemupukan tanaman komersial.',
                'harga'         => 350000,
                'rating'        => 4.8,
                'foto'          => '/images/praktisi/edi_sapwanto.jpg',
            ],
            [
                'name'          => 'Ahmad Sujana',
                'email'         => 'ahmad.sujana@hallobun.com',
                'phone'         => '081200000013',
                'spesialisasi'  => 'Perbenihan, Budidaya & Pengolahan Aren',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Direktur CV Sari Aren Mandiri. Spesialis hulu-hilir komoditas aren: penangkaran dan seleksi benih aren unggul, teknik budidaya pohon aren, manajemen penyadapan nira, serta pengolahan produk turunan aren berkualitas tinggi.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/ahmad_sujana.jpg',
            ],
            [
                'name'          => 'Yusthian Hendra Mahardika',
                'email'         => 'yusthian.hendra@hallobun.com',
                'phone'         => '081200000014',
                'spesialisasi'  => 'Budidaya Tanaman Vanili, Polinasi & Pasca Panen',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Praktisi spesialis budidaya tanaman vanili emas hijau. Menguasai teknik perawatan sulur, manajemen naungan, teknik polinasi/penyerbukan bunga presisi, pemupukan organik, serta proses curing dan pengolahan pasca panen vanili ekspor.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/yusthian_hendra.jpg',
            ],
            [
                'name'          => 'Chandra Rika Herlin, S.P.',
                'email'         => 'chandra.rika@hallobun.com',
                'phone'         => '081200000015',
                'spesialisasi'  => 'Pembibitan Sawit & Budidaya Kelapa Sawit',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Praktisi agronomi spesialis kelapa sawit dengan pengalaman lapangan intensif (Penasehat/Pendamping). Ahli dalam seleksi & manajemen pembibitan sawit (pre-nursery & main nursery), manajemen kultur teknis, pemupukan efisien, dan perawatan tanaman menghasilkan (TM).',
                'harga'         => 350000,
                'rating'        => 4.8,
                'foto'          => '/images/praktisi/chandra_rika.jpg',
            ],
            [
                'name'          => 'Kodrat Samadikun, Amd.Pi.',
                'email'         => 'kodrat.samadikun@hallobun.com',
                'phone'         => '081200000016',
                'spesialisasi'  => 'Benih & Budidaya Nilam Organik, Minyak Atsiri & Udang Vannamei',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Produsen benih nilam berlisensi dan praktisi budidaya nilam organik serta penyulingan minyak atsiri nilam berkualitas ekspor. Juga menguasai budidaya udang Vannamei dengan metode mikrobiologi ramah lingkungan.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/kodrat_samadikun.jpg',
            ],
            [
                'name'          => 'Nana Supriatna',
                'email'         => 'nana.supriatna@hallobun.com',
                'phone'         => '081200000017',
                'spesialisasi'  => 'Ekspor Impor Rempah, Hasil Hutan Bukan Kayu & Lidi Sawit',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Praktisi perdagangan internasional komoditas sejak 2010. Spesialis ekspor-impor rempah-rempah Nusantara, hasil hutan bukan kayu (HHBK), dan valorisasi limbah perkebunan seperti lidi kelapa sawit untuk pasar global.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/nana_supriatna.jpg',
            ],
            [
                'name'          => 'Ahmad Zakaria',
                'email'         => 'ahmad.zakaria@hallobun.com',
                'phone'         => '081200000018',
                'spesialisasi'  => 'Kopi Robusta Temanggung, Budidaya & Prosesor Kopi',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Ketua MPIG Kopi Robusta Temanggung, pengelola kebun kopi dan narasumber nasional perkopian. Ahli dalam budidaya kopi robusta dataran tinggi, pemangkasan, pemupukan, panen petik merah, hingga proses pasca panen (natural, honey, full wash, winey processor).',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/ahmad_zakaria.jpg',
            ],
            [
                'name'          => 'Opi',
                'email'         => 'opi.vanili@hallobun.com',
                'phone'         => '081200000019',
                'spesialisasi'  => 'Budidaya & Perawatan Kebun Vanili',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Praktisi lapangan budidaya tanaman vanili. Berpengalaman intensif dalam teknik budidaya, pembuatan paranet/greenhouse vanili, perawatan media tanam, pemangkasan sulur, serta perlindungan tanaman vanili dari busuk batang.',
                'harga'         => 350000,
                'rating'        => 4.8,
                'foto'          => '/images/praktisi/opi.jpg',
            ],
            [
                'name'          => 'Agus S. Susanto, M.Pd',
                'email'         => 'agus.susanto@hallobun.com',
                'phone'         => '081200000020',
                'spesialisasi'  => 'Budidaya Lada & Kelembagaan Petani (Ketua MPIG Lada Lamtim)',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Ketua Kelompok Tani Lada, Ketua Prabu Lampung Timur, dan Ketua MPIG Lada Hitam Lampung Timur. Pakar budidaya lada unggul, manajemen tiang panjat lada, penanganan penyakit busuk pangkal batang lada, serta penguatan kelembagaan kelompok tani.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/agus_susanto.jpg',
            ],
            [
                'name'          => 'Ir. Hindarwati Sudjatmiko, MSc',
                'email'         => 'hindarwati.sudjatmiko@hallobun.com',
                'phone'         => '081200000021',
                'spesialisasi'  => 'Standarisasi (ISO, SNI & ISPO)',
                'klasifikasi'   => 'super_spesialis',
                'bio'           => 'Praktisi Super Spesialis Standarisasi (ISO, SNI & ISPO). Ahli dalam konsultasi sistem manajemen mutu (ISO), Standar Nasional Indonesia (SNI), serta pendampingan sertifikasi Indonesian Sustainable Palm Oil (ISPO) dan kepatuhan regulasi industri perkebunan.',
                'harga'         => 750000,
                'rating'        => 5.0,
                'foto'          => '/images/praktisi/hindarwati_sudjatmiko.jpg',
            ],
            [
                'name'          => 'Ir. Ruslan',
                'email'         => 'ruslan@hallobun.com',
                'phone'         => '081200000022',
                'spesialisasi'  => 'Kelapa Genjah Kopyor & Pengembangan Kampung Wisata Kelapa',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Ketua Asosiasi Petani Kelapa Indonesia (APKI) dan produsen benih Kelapa Genjah Kopyor Pati. Praktisi spesialis budidaya Kelapa Genjah Kopyor, seleksi benih unggul, pemupukan terpadu, serta pengembangan konsep agrowisata Kampung Wisata Kelapa.',
                'harga'         => 350000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/ruslan.jpg',
            ],
            [
                'name'          => 'Prof. Dr. Ir. Rubiyo, M.Si',
                'email'         => 'prof.rubiyo@hallobun.com',
                'phone'         => '081200000023',
                'spesialisasi'  => 'Kakao (Benih, Budidaya & Pengolahan)',
                'klasifikasi'   => 'super_spesialis',
                'bio'           => 'Profesor Riset dan Praktisi Super Spesialis Kakao (Benih, Budidaya & Pengolahan). Pakar pemuliaan dan pelepasan varietas unggul baru (VUB) kakao, teknologi perbenihan, manajemen budidaya kakao berkelanjutan, pengendalian penyakit utama kakao, serta teknologi fermentasi dan pengolahan pasca panen kakao mutu ekspor.',
                'harga'         => 750000,
                'rating'        => 5.0,
                'foto'          => '/images/praktisi/prof_rubiyo.jpg',
            ],
        ];

        // Hapus konsultan lama yang tidak ada di daftar resmi docx
        $allowedEmails = array_column($praktisiData, 'email');
        $oldUsers = User::where('role', 'konsultan')->whereNotIn('email', $allowedEmails)->get();
        foreach ($oldUsers as $oldUser) {
            if ($oldUser->konsultan) {
                Jadwal::where('konsultan_id', $oldUser->konsultan->id)->delete();
                $oldUser->konsultan->delete();
            }
            $oldUser->delete();
        }

        foreach ($praktisiData as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'              => $data['name'],
                    'password'          => Hash::make('halobun2026'),
                    'role'              => 'konsultan',
                    'phone'             => $data['phone'],
                    'email_verified_at' => now(),
                ]
            );

            $konsultan = Konsultan::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'spesialisasi'     => $data['spesialisasi'],
                    'klasifikasi'      => $data['klasifikasi'],
                    'bio'              => $data['bio'],
                    'foto'             => $data['foto'],
                    'harga_per_sesi'   => $data['harga'],
                    'durasi_menit'     => 60,
                    'is_active'        => true,
                    'rating'           => $data['rating'],
                    'total_konsultasi' => rand(40, 180),
                ]
            );

            // Buat jadwal jika belum ada
            if (Jadwal::where('konsultan_id', $konsultan->id)->count() === 0) {
                for ($i = 1; $i <= 14; $i++) {
                    $date = now()->addDays($i);
                    if ($date->isWeekday()) {
                        Jadwal::create([
                            'konsultan_id' => $konsultan->id,
                            'tanggal'      => $date->format('Y-m-d'),
                            'jam_mulai'    => '09:00',
                            'jam_selesai'  => '10:00',
                            'is_available' => true,
                        ]);
                        Jadwal::create([
                            'konsultan_id' => $konsultan->id,
                            'tanggal'      => $date->format('Y-m-d'),
                            'jam_mulai'    => '14:00',
                            'jam_selesai'  => '15:00',
                            'is_available' => true,
                        ]);
                    }
                }
            }
        }

        // ─── Sarana Pertanian ─────────────────────────────
        $saranaData = [
            ['Pupuk Urea Cap Kuda', 'pupuk', 'Pupuk nitrogen tinggi untuk kebutuhan pertumbuhan tanaman vegetatif.', 'Pupuk urea berkualitas tinggi dengan kandungan N 46%.', 45000, 55000, 100, 'kg', 'Pusri'],
            ['Pupuk NPK Mutiara', 'pupuk', 'Pupuk lengkap NPK 16-16-16 untuk semua jenis tanaman.', 'Formula seimbang untuk pertumbuhan optimal.', 85000, null, 80, 'kg', 'Mutiara'],
            ['Bibit Cabai Merah Keriting F1', 'bibit', 'Bibit cabai hibrida tahan penyakit, produktivitas tinggi.', 'Bibit F1 dengan produktivitas 1-1.5 kg per tanaman.', 35000, 45000, 200, 'sachet', 'East West Seed'],
            ['Bibit Padi IR64', 'bibit', 'Benih padi unggul varietas IR64. Tahan wereng coklat.', 'Hasil 6-8 ton GKP per hektar.', 25000, null, 150, 'kg', 'Sang Hyang Seri'],
            ['Pestisida Furadan 3G', 'pestisida', 'Insektisida granular untuk pengendalian hama tanah.', 'Efektif melawan nematoda dan serangga tanah.', 55000, 70000, 60, 'kg', 'FMC'],
            ['Fungisida Dithane M-45', 'pestisida', 'Fungisida protektif broad spectrum untuk berbagai jamur.', 'Kandungan Mankozeb 80%. Aman untuk sayuran.', 48000, null, 90, 'kg', 'Dow AgroSciences'],
            ['Sprayer Elektrik 20L', 'alat', 'Alat semprot elektrik kapasitas 20 liter dengan motor DC.', 'Baterai tahan 4-6 jam. Dilengkapi 4 nosel.', 650000, 750000, 30, 'unit', 'Solo'],
            ['Cangkul Baja Premium', 'alat', 'Cangkul baja karbon tinggi, gagang kayu jati solid.', 'Tahan lama untuk tanah keras sekalipun.', 85000, null, 50, 'unit', 'Fortex'],
            ['POC Biourin Sapi', 'pupuk', 'Pupuk organik cair dari urin sapi yang difermentasi.', 'Kaya hormon pertumbuhan alami untuk tanaman.', 30000, 40000, 120, 'liter', 'BioStar'],
            ['ZA Ammonium Sulfate', 'pupuk', 'Pupuk nitrogen dan sulfur untuk mendorong pertumbuhan.', 'Ideal untuk tanaman yang membutuhkan sulfur tinggi.', 40000, null, 75, 'kg', 'Petrokimia'],
            ['Bibit Jagung Hibrida NK22', 'bibit', 'Benih jagung hibrida tahan bulai dan produktivitas tinggi.', 'Potensi hasil 9-12 ton per hektar.', 95000, 110000, 40, 'kg', 'Syngenta'],
            ['Herbisida Roundup 480', 'pestisida', 'Herbisida sistemik non-selektif berbahan aktif glifosat.', 'Efektif untuk gulma tahunan dan rumput liar.', 75000, null, 55, 'liter', 'Monsanto'],
        ];

        foreach ($saranaData as $idx => [$nama, $kategori, $desc, $singkat, $harga, $hargaCoret, $stok, $satuan, $merek]) {
            Sarana::updateOrCreate(
                ['nama' => $nama],
                [
                    'kategori'         => $kategori,
                    'deskripsi'        => $desc,
                    'deskripsi_singkat'=> $singkat,
                    'harga'            => $harga,
                    'harga_coret'      => $hargaCoret,
                    'stok'             => $stok,
                    'satuan'           => $satuan,
                    'merek'            => $merek,
                    'is_active'        => true,
                    'is_featured'      => $idx < 4,
                    'total_terjual'    => rand(10, 200),
                ]
            );
        }

        // ─── Demo User ────────────────────────────────────
        User::updateOrCreate(
            ['email' => 'demo@hallobun.com'],
            [
                'name'     => 'Petani Demo',
                'password' => Hash::make('halobun2026'),
                'role'     => 'user',
                'phone'    => '082345678901',
                'email_verified_at' => now(),
            ]
        );
    }
}
