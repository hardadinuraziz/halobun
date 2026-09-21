<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saranas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('kategori'); // pupuk, bibit, alat, pestisida, dll
            $table->text('deskripsi');
            $table->text('deskripsi_singkat')->nullable();
            $table->decimal('harga', 12, 2);
            $table->decimal('harga_coret', 12, 2)->nullable();
            $table->integer('stok')->default(0);
            $table->string('satuan')->default('pcs'); // kg, liter, pcs, dll
            $table->string('gambar')->nullable();
            $table->json('gambar_galeri')->nullable();
            $table->string('merek')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('total_terjual')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saranas');
    }
};
