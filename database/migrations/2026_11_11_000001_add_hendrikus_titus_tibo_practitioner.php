<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add/update Hendrikus Titus Tibo, S.P. (Praktisi Umum).
     */
    public function up(): void
    {
        $p = [
            'name'          => 'Hendrikus Titus Tibo, S.P.',
            'email'         => 'hendrikus.titus@hallobun.com',
            'phone'         => '081200000024',
            'klasifikasi'   => 'umum',
            'spesialisasi'  => 'Budidaya Hortikultura (Persemaian Bibit, Penanaman, Pemupukan, Pengendalian Hama Penyakit & Panen)',
            'bio'           => 'Praktisi hortikultura berpengalaman dalam pendampingan budidaya tanaman hortikultura secara menyeluruh dari hulu ke hilir: mulai dari teknik persemaian bibit unggul, penanaman, manajemen pemupukan berimbang, pengendalian hama dan penyakit tanaman terpadu (OPT), hingga penanganan panen optimal.',
            'foto'          => '/images/praktisi/hendrikus_titus_tibo.jpg',
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
                'total_konsultasi' => rand(35, 90),
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
        $user = User::where('email', 'hendrikus.titus@hallobun.com')->first();
        if ($user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }
    }
};

