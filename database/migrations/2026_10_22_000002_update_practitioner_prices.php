<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Konsultan;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Update pricing: Praktisi Spesialis Rp 350.000, Praktisi Umum Rp 200.000.
     */
    public function up(): void
    {
        Konsultan::where('klasifikasi', 'spesialis')->update([
            'harga_per_sesi' => 350000,
        ]);

        Konsultan::where('klasifikasi', 'umum')->update([
            'harga_per_sesi' => 200000,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Konsultan::where('klasifikasi', 'spesialis')->update([
            'harga_per_sesi' => 75000,
        ]);

        Konsultan::where('klasifikasi', 'umum')->update([
            'harga_per_sesi' => 50000,
        ]);
    }
};
