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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('admins');
    }
};
