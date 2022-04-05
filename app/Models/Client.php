<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client  extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone', 
        'email',
        'age',
        'gender',
        'weight',
        'height',
        'weight_goal',
        'workout_time',
        'workout_time_per_week',
        'workout_place',
        'diet_type',
        'password',
        'role'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
