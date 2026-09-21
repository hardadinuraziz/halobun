<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('konsultan_id')->constrained()->onDelete('cascade');
            $table->foreignId('jadwal_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('tipe', ['online', 'offline'])->default('online');
            $table->enum('status', ['pending', 'confirmed', 'ongoing', 'completed', 'cancelled'])->default('pending');
            $table->text('keluhan')->nullable();
            $table->string('meeting_room')->nullable();
            $table->string('meeting_link')->nullable();
            $table->text('catatan_konsultan')->nullable();
            $table->timestamp('sesi_mulai')->nullable();
            $table->timestamp('sesi_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
