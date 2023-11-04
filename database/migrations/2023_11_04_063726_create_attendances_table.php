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
        Schema::create('attendances', function (Blueprint $table) {
            
            $table->Increments('id')->unsigned();
            
            $table->time('check_in');
            $table->time('check_out');

            $table->boolean('status')->default(1);
            
            $table->integer('employee_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('schedule_id')->references('id')->on('schedules');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
