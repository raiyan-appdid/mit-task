<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class employee extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $gaurd = 'employee';

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
