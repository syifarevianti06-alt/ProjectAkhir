<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('store_name')->nullable()->after('name');
            $table->string('phone')->nullable()->after('email');
            $table->string('category')->nullable()->after('phone');
            $table->text('address')->nullable()->after('category');
            $table->text('description')->nullable()->after('address');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'store_name',
                'phone',
                'category',
                'address',
                'description',
            ]);
        });
    }
};