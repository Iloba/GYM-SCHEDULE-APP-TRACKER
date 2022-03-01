<?php

namespace App\Models;

use App\Models\Workout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkoutMedia extends Model
{
    use HasFactory;

    public function workout(){
        return $this->belongsTo(Workout::class);
    }
}
