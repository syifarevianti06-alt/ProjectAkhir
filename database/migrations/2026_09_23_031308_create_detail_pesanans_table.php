<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pesanan_id')
                ->constrained('pesanans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('produk_id')
                ->constrained('produks')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->integer('jumlah')->default(1);
            $table->decimal('harga', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanans');
    }
};