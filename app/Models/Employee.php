<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Employee extends Model
// {
//     use HasFactory;
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'ID', 'age', 'gender', 'working_time', 'daily_rent','rent_taken'];
    use HasFactory, SoftDeletes;
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'employee_groups')->withPivot('daily_rent');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}