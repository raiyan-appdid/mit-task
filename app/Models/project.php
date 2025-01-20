<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_project');
    }

    public function getStartDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function getEndDateAttribute($value)
    {
        return $value ? date('d-m-Y', strtotime($value)) : null;
    }

    public function getEmployeeCountAttribute()
    {
        return $this->employees()->count();
    }
}
