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
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Ahli Agribisnis dan Pendamping Budidaya Hortikultura & Tanaman Pangan dari Brebes, Jawa Tengah. Layanan meliputi: konsultasi budidaya hulu-hilir (padi, jagung, cabai, terong, sawi, pakcoy, pepaya, pisang), pengendalian OPT terpadu, manajemen pasca panen & pemasaran, inovasi & efisiensi usaha tani, serta pendampingan petani berbasis lapangan di area Brebes & sekitarnya.',
                'harga'         => 75000,
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
                'harga'         => 50000,
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
                'harga'         => 50000,
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
                'harga'         => 50000,
                'rating'        => 4.7,
                'foto'          => '/images/praktisi/gesang.jpg',
            ],
            [
                'name'          => 'Dhinda Nururrahmah, S.P.',
                'email'         => 'dhinda.nururrahmah@hallobun.com',
                'phone'         => '081200000004',
                'spesialisasi'  => 'Agroekoteknologi & Manajemen Sumber Daya Lahan',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Spesialis Agroekoteknologi (Manajemen Sumber Daya Lahan). Layanan meliputi: budidaya tanaman hortikultura (khusus tomat, melon, labu kuning, semangka), diagnosis kesehatan & kesuburan tanah, manajemen tanah berkelanjutan, dan sistem pertanian lestari.',
                'harga'         => 75000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/dhinda.jpg',
            ],
            [
                'name'          => 'Febriandi Alfredo Sidabukke, S.P.',
                'email'         => 'febriandi.alfredo@hallobun.com',
                'phone'         => '081200000005',
                'spesialisasi'  => 'Hama & Penyakit Tanaman, Pestisida & Proteksi Tanaman',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Ahli Proteksi Tanaman, spesialis penanganan hama dan penyakit tanaman, manajemen pestisida, serta pest control terpadu untuk perkebunan dan pertanian komersial.',
                'harga'         => 75000,
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
                'harga'         => 75000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/ahmad_suhaemi.jpg',
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
