<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add/update Diana Wati, S.P. (Praktisi Spesialis).
     */
    public function up(): void
    {
        $p = [
            'name'          => 'Diana Wati, S.P.',
            'email'         => 'diana.wati@hallobun.com',
            'phone'         => '081200000025',
            'klasifikasi'   => 'spesialis',
            'spesialisasi'  => 'Sertifikasi Organik (EU Organic & USDA-NOP), ICS, Fairtrade & Gula Kelapa Organik',
            'bio'           => 'Praktisi spesialis pertanian berkelanjutan dan sistem sertifikasi organik (>6 tahun pengalaman) pada komoditas kelapa (gula kelapa organik / organic coconut sugar & coconut nectar). Ahli dalam pengembangan dan implementasi sertifikasi EU Organic, USDA-NOP, serta standar Fairtrade, pengelolaan Internal Control System (ICS), ketertelusuran produk (traceability), penyusunan dokumen sertifikasi, pendampingan kelompok tani & koperasi, hingga persiapan dan tindak lanjut audit sertifikasi.',
            'foto'          => '/images/praktisi/diana_wati.jpg',
            'harga'         => 350000,
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
                'total_konsultasi' => rand(40, 95),
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
        $user = User::where('email', 'diana.wati@hallobun.com')->first();
        if ($user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }
    }
};
