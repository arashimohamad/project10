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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('category_name')->nullable();
            $table->string('category_image')->nullable();
            $table->float('category_discount')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();              //current_timestamp() 
            $table->timestamp('updated_at')->nullable()->useCurrent();              //current_timestamp()            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
