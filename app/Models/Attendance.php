<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'employee_id',
        'attendance_date',
        'is_present',
        'half_time',
        'day_and_night',
    ];  
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}