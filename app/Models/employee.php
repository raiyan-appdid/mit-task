<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class employee extends Model
{

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_project');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getImageAttribute($value)
    {
        return url('employee_images/' . $value);
    }

    public function getProjectCountAttribute()
    {
        return $this->projects()->count();
    }
}
