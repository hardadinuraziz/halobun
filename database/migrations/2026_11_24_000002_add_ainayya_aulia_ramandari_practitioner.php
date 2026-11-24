<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add/update Ainayya Aulia Ramandari, S.P. (Praktisi Umum).
     */
    public function up(): void
    {
        $p = [
            'name'          => 'Ainayya Aulia Ramandari, S.P.',
            'email'         => 'ainayya.aulia@hallobun.com',
            'phone'         => '081200000026',
            'klasifikasi'   => 'umum',
            'spesialisasi'  => 'Proteksi Tanaman, Pengendalian OPT, Mikrobiologi Pertanian & Kelapa Sawit',
            'bio'           => 'Sarjana Proteksi Tanaman dari Institut Teknologi Sawit Indonesia (ITSI). Memiliki pengalaman di PT Lonsum Bahlias sebagai asisten laboratorium mikrobiologi serta penelitian proteksi tanaman pada pembibitan kelapa sawit. Menguasai pengamatan dan identifikasi gejala penyakit tanaman, pengamatan jamur patogen, pengendalian organisme pengganggu tanaman (OPT), serta mikrobiologi pertanian.',
            'foto'          => '/images/praktisi/ainayya_aulia_ramandari.jpg',
            'harga'         => 150000,
            'rating'        => 4.9,
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
                'total_konsultasi' => rand(35, 85),
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
        $user = User::where('email', 'ainayya.aulia@hallobun.com')->first();
        if ($user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }
    }
};
