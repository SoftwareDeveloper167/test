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
        Schema::create('attendance_faults', function (Blueprint $table) {
            $table->Increments('id');
            
            $table->time('leave_time')->default(date("H:i:s"));
            $table->date('leave_date')->default(date("Y-m-d"));
            $table->boolean('status')->default(1);
            $table->text('reason')->nullable(true);
            
            $table->integer('employee_id')->unsigned();
            
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_faults');
    }
};
