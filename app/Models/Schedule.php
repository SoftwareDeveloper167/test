<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function locations() {
        return $this->hasOne(Location::class , 'id' , 'location_id');
    }

    public function shifts() {
        return $this->hasOne(Shift::class , 'id' , 'shift_id');
    }

    public function attendances() {
        return $this->hasMany(Attendance::class , 'schedule_id' , 'id');
    }
    

}
