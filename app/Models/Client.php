<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
        'password'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
