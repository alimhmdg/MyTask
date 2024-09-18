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
        Schema::create('employee__tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Employee_Id');
            $table->foreign('Employee_Id')->references('id')->on('employees');
         
            $table->unsignedBigInteger('Task_Id');
            $table->foreign('Task_Id')->references('id')->on('tasks');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee__tasks');
    }
};
