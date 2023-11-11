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
        Schema::create('products_filters', function (Blueprint $table) {
            $table->id();
            $table->string('filter_name')->nullable();
            $table->string('filter_value')->nullable();
            $table->integer('sort')->nullable();
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
        Schema::dropIfExists('products_filters');
    }
};
