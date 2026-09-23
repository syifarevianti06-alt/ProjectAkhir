<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('nama_penerima', 100);
            $table->string('nomor_telepon', 20);
            $table->text('alamat_lengkap');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('kode_pos', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};