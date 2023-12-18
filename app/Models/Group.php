<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Group extends Model
// {
//     use HasFactory;
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_groups')->withPivot('daily_rent');
    }
}