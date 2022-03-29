<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'workout',
        'start_date',
        'end_date',
        'workout_time'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }
}
