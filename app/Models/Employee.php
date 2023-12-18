<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Employee extends Model
// {
//     use HasFactory;
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'employee_groups')->withPivot('daily_rent');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}