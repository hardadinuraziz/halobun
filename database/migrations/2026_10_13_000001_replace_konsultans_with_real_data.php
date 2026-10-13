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
     * Replace all dummy/placeholder practitioners with real Halobun practitioners
     * based on "data praktisi halobun.docx".
     */
    public function up(): void
    {
        // ──────────────────────────────────────────────────────────────────────
        // 1. Remove all existing konsultan + their user accounts (keep admin)
        // ──────────────────────────────────────────────────────────────────────
        $oldKonsultanUserIds = Konsultan::pluck('user_id')->toArray();
        Jadwal::whereIn('konsultan_id', Konsultan::pluck('id')->toArray())->delete();
        Konsultan::query()->delete();
        User::whereIn('id', $oldKonsultanUserIds)->where('role', 'konsultan')->delete();

        // ──────────────────────────────────────────────────────────────────────
        // 2. Real practitioners from data praktisi halobun.docx
        // ──────────────────────────────────────────────────────────────────────
        // Format: [name, email, phone, spesialisasi, klasifikasi, bio, harga, rating, foto]
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
                'bio'           => 'Praktisi dengan latar belakang sosiologi pertanian dan budidaya pertanian. Fokus pada pengembangan budidaya pertanian dan penguatan budaya petani di komunitas lokal.',
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
                'bio'           => 'Spesialis Agroekoteknologi dengan fokus pada manajemen sumber daya lahan. Ahli dalam budidaya tanaman hortikultura (khusus tomat, melon, labu kuning, semangka), kesehatan & kesuburan tanah, manajemen tanah berlanjut, dan pertanian berkelanjutan.',
                'harga'         => 85000,
                'rating'        => 4.9,
                'foto'          => '/images/praktisi/dhinda.jpg',
            ],
            [
                'name'          => 'Febriandi Alfredo Sidabukke, S.P.',
                'email'         => 'febriandi.alfredo@hallobun.com',
                'phone'         => '081200000005',
                'spesialisasi'  => 'Hama & Penyakit Tanaman, Pestisida & Proteksi Tanaman',
                'klasifikasi'   => 'spesialis',
                'bio'           => 'Spesialis proteksi tanaman dengan keahlian di bidang hama dan penyakit tanaman, pestisida, dan pest control. Berpengalaman dalam identifikasi dan penanganan OPT (Organisme Pengganggu Tanaman) serta penerapan strategi proteksi tanaman yang efektif dan efisien.',
                'harga'         => 85000,
                'rating'        => 4.8,
                'foto'          => '/images/praktisi/febriandi.jpg',
            ],
        ];

        // ──────────────────────────────────────────────────────────────────────
        // 3. Insert each practitioner
        // ──────────────────────────────────────────────────────────────────────
        foreach ($praktisiData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name'              => $data['name'],
                    'password'          => Hash::make('halobun2026'),
                    'role'              => 'konsultan',
                    'phone'             => $data['phone'],
                    'email_verified_at' => now(),
                    'avatar'            => $data['foto'],
                ]
            );

            $konsultan = Konsultan::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'spesialisasi'     => $data['spesialisasi'],
                    'klasifikasi'      => $data['klasifikasi'],
                    'bio'              => $data['bio'],
                    'harga_per_sesi'   => $data['harga'],
                    'durasi_menit'     => 60,
                    'is_active'        => true,
                    'rating'           => $data['rating'],
                    'total_konsultasi' => rand(30, 200),
                    'foto'             => $data['foto'],
                ]
            );

            // Generate jadwal for next 14 weekdays
            for ($i = 1; $i <= 14; $i++) {
                $date = now()->addDays($i);
                if ($date->isWeekday()) {
                    Jadwal::firstOrCreate([
                        'konsultan_id' => $konsultan->id,
                        'tanggal'      => $date->format('Y-m-d'),
                        'jam_mulai'    => '09:00',
                        'jam_selesai'  => '10:00',
                    ], ['is_available' => true]);

                    Jadwal::firstOrCreate([
                        'konsultan_id' => $konsultan->id,
                        'tanggal'      => $date->format('Y-m-d'),
                        'jam_mulai'    => '14:00',
                        'jam_selesai'  => '15:00',
                    ], ['is_available' => true]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-delete the real practitioners (only a rollback hint; original data not restored)
        $emails = [
            'kismatullaili@gmail.com',
            'chairani.sp@hallobun.com',
            'maria.ulfa.sp@hallobun.com',
            'gesang.arul@hallobun.com',
            'dhinda.nururrahmah@hallobun.com',
            'febriandi.alfredo@hallobun.com',
        ];

        $userIds = User::whereIn('email', $emails)->pluck('id');
        $konsultanIds = Konsultan::whereIn('user_id', $userIds)->pluck('id');
        Jadwal::whereIn('konsultan_id', $konsultanIds)->delete();
        Konsultan::whereIn('user_id', $userIds)->delete();
        User::whereIn('id', $userIds)->delete();
    }
};
