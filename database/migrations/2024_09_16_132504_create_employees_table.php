<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manger_id');
            
            $table->unsignedBigInteger('Department_Id');
            $table->foreign('manger_id')->references('id')->on('users');
            $table->foreign('Department_Id')->references('id')->on('departments');
            $table->string('first_name',999);
            $table->string('last_name',999);
            $table->decimal('salary', 8,2);
            $table->string('image',999);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
