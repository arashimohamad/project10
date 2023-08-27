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
        Schema::create('admins_roles', function (Blueprint $table) {
            $table->id();                                                           //default bgint(20)
            $table->integer('subadmin_id')->nullable()->comment('admin_id');        //int(20), subadmin_id refer to admins table's id
            $table->string('module')->nullable();
            $table->string('view_access')->nullable();
            $table->string('edit_access')->nullable();
            $table->string('full_access')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();              //current_timestamp() 
            $table->timestamp('updated_at')->nullable()->useCurrent();              //current_timestamp() 
            //$table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins_roles');
    }
};
