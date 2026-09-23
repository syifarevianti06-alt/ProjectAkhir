<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('nama_produk', 150);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2)->default(0);
            $table->integer('stok')->default(0);
            $table->string('ukuran', 50)->nullable();
            $table->string('warna', 50)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};