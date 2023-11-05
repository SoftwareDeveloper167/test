<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $appends = [
        'working_hours',
    ];


    public function employees() {
        return $this->hasOne(Employee::class , 'id' , 'employee_id');
    }
    
    public function schedules() {
        return $this->belongsTo(Schedule::class , 'schedule_id' , 'id');
    }
    
    public function getWorkingHoursAttribute()
    {
        return Carbon::parse($this->check_in)->diffInHours(Carbon::parse($this->check_out));
    }

}
