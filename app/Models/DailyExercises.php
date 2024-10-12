<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyExercises extends Model
{
    use HasFactory;

    protected $fillable = ['daily_exercise_id', 'exercise_id'];

    public function program_schedule(){
        return $this->hasMany(Exercises::class);
    }

    public function exercise(){
        return $this->hasMany(Exercises::class);
    }


}
