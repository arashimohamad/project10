<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('is_bestseller',['No', 'Yes'])->nullable()->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('is_bestseller');
        });
    }
};

// run php artisan migrate
// After that please update all column is_bestseller as No on phpmyadmin
// UPDATE `products` SET `is_bestseller`='No'; 