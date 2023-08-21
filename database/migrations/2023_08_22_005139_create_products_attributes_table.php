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
        Schema::create('products_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->string('size')->nullable();
            $table->string('sku')->nullable();
            $table->float('price')->nullable();
            $table->integer('stock')->nullable();
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
        Schema::dropIfExists('products_attributes');
    }
};
