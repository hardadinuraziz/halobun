<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Strictly purge all non-official practitioners so only the 6 from
     * "data praktisi halobun.docx" remain in the database.
     */
    public function up(): void
    {
        $officialPraktisi = [
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
        ];

        $allowedEmails = array_column($officialPraktisi, 'email');

        // 1. Hapus semua user konsultan yang tidak ada dalam daftar resmi
        $unauthorizedUsers = User::where('role', 'konsultan')
            ->whereNotIn('email', $allowedEmails)
            ->get();

        foreach ($unauthorizedUsers as $user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }

        // 2. Hapus data konsultan yang orphan (tidak memiliki user yang valid atau user bukan di daftar resmi)
        $officialUserIds = User::whereIn('email', $allowedEmails)->pluck('id')->toArray();
        $orphanKonsultans = Konsultan::whereNotIn('user_id', $officialUserIds)->get();
        foreach ($orphanKonsultans as $k) {
            Jadwal::where('konsultan_id', $k->id)->delete();
            $k->delete();
        }

        // 3. Pastikan ke-6 praktisi resmi ada dan datanya lengkap
        foreach ($officialPraktisi as $p) {
            $user = User::updateOrCreate(
                ['email' => $p['email']],
                [
                    'name'              => $p['name'],
                    'password'          => Hash::make('halobun2026'),
                    'role'              => 'konsultan',
                    'phone'             => $p['phone'],
                    'email_verified_at' => now(),
                    'avatar'            => $p['foto'],
                ]
            );

            $konsultan = Konsultan::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'spesialisasi'     => $p['spesialisasi'],
                    'klasifikasi'      => $p['klasifikasi'],
                    'bio'              => $p['bio'],
                    'foto'             => $p['foto'],
                    'harga_per_sesi'   => $p['harga'],
                    'durasi_menit'     => 60,
                    'is_active'        => true,
                    'rating'           => $p['rating'],
                    'total_konsultasi' => rand(40, 150),
                ]
            );

            // Buat jadwal untuk 14 hari kerja ke depan jika belum ada
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
    }

    public function down(): void
    {
        // No down needed
    }
};
