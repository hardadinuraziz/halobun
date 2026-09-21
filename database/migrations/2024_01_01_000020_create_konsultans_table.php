<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konsultans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('spesialisasi');
            $table->text('bio')->nullable();
            $table->string('foto')->nullable();
            $table->decimal('harga_per_sesi', 10, 2)->default(0);
            $table->integer('durasi_menit')->default(60);
            $table->boolean('is_active')->default(false);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_konsultasi')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konsultans');
    }
};
