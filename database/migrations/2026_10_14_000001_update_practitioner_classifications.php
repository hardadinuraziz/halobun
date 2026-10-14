<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\User;
use App\Models\Konsultan;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Move all practitioners to 'umum' (Rp 50.000) except Ahmad Suhaemi, S.TP ('spesialis', Rp 75.000).
     */
    public function up(): void
    {
        // 1. Pastikan Ahmad Suhaemi sebagai satu-satunya spesialis
        $ahmadUser = User::where('email', 'ahmad.suhaemi@hallobun.com')->first();
        if ($ahmadUser && $ahmadUser->konsultan) {
            $ahmadUser->konsultan->update([
                'klasifikasi'    => 'spesialis',
                'harga_per_sesi' => 75000,
            ]);
        }

        // 2. Pindahkan semua konsultan lainnya ke klasifikasi 'umum' dengan harga Rp 50.000
        $otherKonsultans = Konsultan::whereHas('user', function ($query) {
            $query->where('email', '!=', 'ahmad.suhaemi@hallobun.com');
        })->get();

        foreach ($otherKonsultans as $k) {
            $k->update([
                'klasifikasi'    => 'umum',
                'harga_per_sesi' => 50000,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op or keep safe
    }
};
