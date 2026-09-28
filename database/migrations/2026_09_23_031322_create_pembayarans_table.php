<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pesanan_id')
                ->constrained('pesanans')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('metode_pembayaran', 50)->default('QRIS');
            $table->decimal('jumlah_bayar', 12, 2)->default(0);

            $table->enum('status', [
                'menunggu',
                'berhasil',
                'gagal'
            ])->default('menunggu');

            $table->dateTime('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};