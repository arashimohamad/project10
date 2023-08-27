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
        // Just type "Column" and laravel snippet will display $table->xxx()
        // Pre requisite : must install Laravel Snippet extension
        Schema::create('products_images', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('image_sort')->default('0');            
            $table->tinyInteger('status')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();  //current_timestamp() 
            $table->timestamp('updated_at')->nullable()->useCurrent();  //current_timestamp()    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_images');
    }
};
