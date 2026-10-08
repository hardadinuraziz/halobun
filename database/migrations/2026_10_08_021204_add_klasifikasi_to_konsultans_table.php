<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('konsultans', function (Blueprint $table) {
            $table->string('klasifikasi')->default('spesialis')->after('spesialisasi');
        });

        // Set classifications for existing consultants
        \Illuminate\Support\Facades\DB::table('konsultans')->where('id', 1)->update(['klasifikasi' => 'spesialis']);
        \Illuminate\Support\Facades\DB::table('konsultans')->where('id', 2)->update(['klasifikasi' => 'spesialis']);
        \Illuminate\Support\Facades\DB::table('konsultans')->where('id', 3)->update(['klasifikasi' => 'super_spesialis']);
        \Illuminate\Support\Facades\DB::table('konsultans')->where('id', 4)->update(['klasifikasi' => 'spesialis']);
        \Illuminate\Support\Facades\DB::table('konsultans')->where('id', 5)->update(['klasifikasi' => 'umum', 'harga_per_sesi' => 45000]);
        \Illuminate\Support\Facades\DB::table('konsultans')->where('id', 6)->update(['klasifikasi' => 'spesialis']);

        // Tambahkan praktisi umum tambahan jika belum ada agar kategori Praktisi Umum punya beberapa pilihan
        $umumUser = \App\Models\User::firstOrCreate(
            ['email' => 'bayu.pratama@hallobun.com'],
            [
                'name'     => 'Bayu Pratama, S.P.',
                'password' => \Illuminate\Support\Facades\Hash::make('halobun2026'),
                'role'     => 'konsultan',
                'phone'    => '081298765431',
                'email_verified_at' => now(),
            ]
        );

        $kUmum = \App\Models\Konsultan::firstOrCreate(
            ['user_id' => $umumUser->id],
            [
                'spesialisasi'     => 'Pekekarangan, Sayuran Rumahan & Tanaman Hias',
                'klasifikasi'      => 'umum',
                'bio'              => 'Agronomis lapangan dengan fokus bimbingan berkebun pekarangan, pembuatan media tanam subur, dan perawatan sayuran hidroponik pemula.',
                'harga_per_sesi'   => 35000,
                'durasi_menit'     => 45,
                'is_active'        => true,
                'rating'           => 4.8,
                'total_konsultasi' => 142,
            ]
        );

        // Tambahkan jadwal untuk praktisi umum baru
        for ($i = 1; $i <= 7; $i++) {
            $date = now()->addDays($i);
            if ($date->isWeekday()) {
                \App\Models\Jadwal::firstOrCreate([
                    'konsultan_id' => $kUmum->id,
                    'tanggal'      => $date->format('Y-m-d'),
                    'jam_mulai'    => '09:00',
                    'jam_selesai'  => '10:00',
                ], ['is_available' => true]);
            }
        }

        // Tambahkan praktisi super spesialis kedua (Profesor Fitopatologi / Riset Tanah)
        $superUser = \App\Models\User::firstOrCreate(
            ['email' => 'prof.suwandi@hallobun.com'],
            [
                'name'     => 'Prof. Dr. Ir. Suwandi, M.Sc',
                'password' => \Illuminate\Support\Facades\Hash::make('halobun2026'),
                'role'     => 'konsultan',
                'phone'    => '081398765432',
                'email_verified_at' => now(),
            ]
        );

        $kSuper = \App\Models\Konsultan::firstOrCreate(
            ['user_id' => $superUser->id],
            [
                'spesialisasi'     => 'Bioteknologi Pertanian & Audit Kebun Industri',
                'klasifikasi'      => 'super_spesialis',
                'bio'              => 'Guru besar dan peneliti utama bioteknologi tanaman & mikrobiologi tanah. Berpengalaman dalam audit lahan komersial luas dan sertifikasi GAP.',
                'harga_per_sesi'   => 250000,
                'durasi_menit'     => 60,
                'is_active'        => true,
                'rating'           => 5.0,
                'total_konsultasi' => 96,
            ]
        );

        for ($i = 1; $i <= 7; $i++) {
            $date = now()->addDays($i);
            if ($date->isWeekday()) {
                \App\Models\Jadwal::firstOrCreate([
                    'konsultan_id' => $kSuper->id,
                    'tanggal'      => $date->format('Y-m-d'),
                    'jam_mulai'    => '14:00',
                    'jam_selesai'  => '15:00',
                ], ['is_available' => true]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsultans', function (Blueprint $table) {
            $table->dropColumn('klasifikasi');
        });
    }
};
