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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name')->nullable(); 
            $table->string('product_code')->nullable();
            $table->string('product_color')->nullable(); 
            $table->string('family_color')->nullable(); 
            $table->string('group_code')->nullable(); 
            $table->float('product_price')->nullable(); 
            $table->float('product_discount')->nullable(); 
            $table->string('discount_type')->nullable(); 
            $table->float('final_price')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('product_video')->nullable();
            $table->text('description')->nullable();
            $table->text('wash_care')->nullable();
            $table->text('search_keywords')->nullable();
            $table->string('fabric')->nullable();
            $table->string('pattern')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('fit')->nullable();
            $table->string('occasion')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->enum('is_featured', ['No', 'Yes'])->nullable(); 
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
        Schema::dropIfExists('products');
    }
};
