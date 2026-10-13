<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Konsultan;
use App\Models\Jadwal;

return new class extends Migration
{
    /**
     * Run the migrations to add Ahmad Suhaemi, S.TP as Praktisi Spesialis.
     */
    public function up(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'ahmad.suhaemi@hallobun.com'],
            [
                'name'              => 'Ahmad Suhaemi, S.TP',
                'password'          => Hash::make('halobun2026'),
                'role'              => 'konsultan',
                'phone'             => '081200000006',
                'email_verified_at' => now(),
                'avatar'            => '/images/praktisi/ahmad_suhaemi.jpg',
            ]
        );

        $konsultan = Konsultan::updateOrCreate(
            ['user_id' => $user->id],
            [
                'spesialisasi'     => 'Sertifikasi Organik & Perkebunan Kelapa (Coconut Plantation & Farmer)',
                'klasifikasi'      => 'spesialis',
                'bio'              => 'Praktisi spesialis sertifikasi organik dengan pengalaman sebagai Organic Certification Officer & Internal Control System. Memiliki keahlian mendalam pada standar sertifikasi organik perkebunan kelapa (Coconut Plantation & Farmer) serta pendampingan budidaya petani berkelanjutan.',
                'foto'             => '/images/praktisi/ahmad_suhaemi.jpg',
                'harga_per_sesi'   => 75000,
                'durasi_menit'     => 60,
                'is_active'        => true,
                'rating'           => 4.9,
                'total_konsultasi' => 52,
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $user = User::where('email', 'ahmad.suhaemi@hallobun.com')->first();
        if ($user) {
            if ($user->konsultan) {
                Jadwal::where('konsultan_id', $user->konsultan->id)->delete();
                $user->konsultan->delete();
            }
            $user->delete();
        }
    }
};
