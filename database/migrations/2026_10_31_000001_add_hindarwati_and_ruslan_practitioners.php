<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add/update Ir. Hindarwati Sudjatmiko, MSc (Super Spesialis)
     * and Ir. Ruslan (Spesialis).
     */
    public function up(): void
    {
        $practitioners = [
            [
                'name'          => 'Ir. Hindarwati Sudjatmiko, MSc',
                'email'         => 'hindarwati.sudjatmiko@hallobun.com',
                'phone'         => '081200000021',
                'klasifikasi'   => 'super_spesialis',
                'spesialisasi'  => 'Standarisasi (ISO, SNI & ISPO)',
                'bio'           => 'Praktisi Super Spesialis Standarisasi (ISO, SNI & ISPO). Ahli dalam konsultasi sistem manajemen mutu (ISO), Standar Nasional Indonesia (SNI), serta pendampingan sertifikasi Indonesian Sustainable Palm Oil (ISPO) dan kepatuhan regulasi industri perkebunan.',
                'foto'          => '/images/praktisi/hindarwati_sudjatmiko.jpg',
                'harga'         => 750000,
                'rating'        => 5.0,
            ],
            [
                'name'          => 'Ir. Ruslan',
                'email'         => 'ruslan@hallobun.com',
                'phone'         => '081200000022',
                'klasifikasi'   => 'spesialis',
                'spesialisasi'  => 'Kelapa Genjah Kopyor & Pengembangan Kampung Wisata Kelapa',
                'bio'           => 'Ketua Asosiasi Petani Kelapa Indonesia (APKI) dan produsen benih Kelapa Genjah Kopyor Pati. Praktisi spesialis budidaya Kelapa Genjah Kopyor, seleksi benih unggul, pemupukan terpadu, serta pengembangan konsep agrowisata Kampung Wisata Kelapa.',
                'foto'          => '/images/praktisi/ruslan.jpg',
                'harga'         => 350000,
                'rating'        => 4.9,
            ],
        ];

        foreach ($practitioners as $p) {
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
                    'total_konsultasi' => rand(45, 110),
                ]
            );

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $emails = [
            'hindarwati.sudjatmiko@hallobun.com',
            'ruslan@hallobun.com',
        ];

        $users = User::whereIn('email', $emails)->get();
        foreach ($users as $user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }
    }
};

