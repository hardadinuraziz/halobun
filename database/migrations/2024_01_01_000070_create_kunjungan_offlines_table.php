<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan_offlines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('konsultan_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nama_pemilik');
            $table->string('phone');
            $table->date('tanggal_kunjungan');
            $table->time('jam_kunjungan');
            $table->text('alamat_lahan');
            $table->string('kota');
            $table->string('provinsi');
            $table->text('jenis_tanaman');
            $table->text('masalah_yang_dihadapi');
            $table->decimal('luas_lahan', 10, 2)->nullable();
            $table->string('satuan_lahan')->default('hektar');
            $table->enum('status', ['pending', 'confirmed', 'visited', 'completed', 'cancelled'])->default('pending');
            $table->text('laporan_kunjungan')->nullable();
            $table->decimal('biaya', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan_offlines');
    }
};
