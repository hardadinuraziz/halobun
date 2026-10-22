<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Konsultan;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Update pricing: Praktisi Umum Rp 150.000.
     */
    public function up(): void
    {
        Konsultan::where('klasifikasi', 'umum')->update([
            'harga_per_sesi' => 150000,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Konsultan::where('klasifikasi', 'umum')->update([
            'harga_per_sesi' => 200000,
        ]);
    }
};
