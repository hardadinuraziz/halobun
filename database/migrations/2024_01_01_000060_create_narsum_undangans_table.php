<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('narsum_undangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_acara');
            $table->string('penyelenggara');
            $table->date('tanggal_acara');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('lokasi');
            $table->string('kota');
            $table->text('tema');
            $table->text('deskripsi_kebutuhan');
            $table->integer('estimasi_peserta')->default(0);
            $table->enum('format', ['offline', 'online', 'hybrid'])->default('offline');
            $table->decimal('budget', 12, 2)->nullable();
            $table->string('kontak_pic');
            $table->string('phone_pic');
            $table->enum('status', ['pending', 'review', 'approved', 'rejected'])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('narsum_undangans');
    }
};
