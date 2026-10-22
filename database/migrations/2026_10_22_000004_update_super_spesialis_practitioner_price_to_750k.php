<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Konsultan;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Update pricing: Praktisi Super Spesialis Rp 750.000.
     */
    public function up(): void
    {
        Konsultan::where('klasifikasi', 'super_spesialis')->update([
            'harga_per_sesi' => 750000,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Konsultan::where('klasifikasi', 'super_spesialis')->update([
            'harga_per_sesi' => 200000,
        ]);
    }
};
