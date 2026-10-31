<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add/update Prof. Dr. Ir. Rubiyo, M.Si (Super Spesialis).
     */
    public function up(): void
    {
        $p = [
            'name'          => 'Prof. Dr. Ir. Rubiyo, M.Si',
            'email'         => 'prof.rubiyo@hallobun.com',
            'phone'         => '081200000023',
            'klasifikasi'   => 'super_spesialis',
            'spesialisasi'  => 'Kakao (Benih, Budidaya & Pengolahan)',
            'bio'           => 'Profesor Riset dan Praktisi Super Spesialis Kakao (Benih, Budidaya & Pengolahan). Pakar pemuliaan dan pelepasan varietas unggul baru (VUB) kakao, teknologi perbenihan, manajemen budidaya kakao berkelanjutan, pengendalian penyakit utama kakao, serta teknologi fermentasi dan pengolahan pasca panen kakao mutu ekspor.',
            'foto'          => '/images/praktisi/prof_rubiyo.jpg',
            'harga'         => 750000,
            'rating'        => 5.0,
        ];

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
                'total_konsultasi' => rand(60, 140),
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $user = User::where('email', 'prof.rubiyo@hallobun.com')->first();
        if ($user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }
    }
};

