<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->string('address_name');
            $table->string('address_phone');
            $table->text('address_full');
            $table->string('address_city');
            $table->string('address_postal_code');
            $table->unsignedBigInteger('subtotal');
            $table->unsignedBigInteger('total');
            $table->string('payment_method')->default('QRIS');
            $table->string('status')->default('diproses'); // diproses, dikirim, selesai
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('orders'); }
};