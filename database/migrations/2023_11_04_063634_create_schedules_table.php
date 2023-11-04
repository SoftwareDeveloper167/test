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
        Schema::create('schedules', function (Blueprint $table) {
            
            $table->Increments('id')->unsigned();
            $table->date('attendance_date')->default(date("Y-m-d"));
            $table->integer('employee_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('shift_id')->unsigned();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('shift_id')->references('id')->on('shifts');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
