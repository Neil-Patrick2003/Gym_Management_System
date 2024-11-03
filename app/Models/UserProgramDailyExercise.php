<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgramDailyExercise extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_id', 'is_complete', 'user_program_shedule_id'];

    public function user_program_schedule(){
        return $this->hasMany(UserProgramSchedule::class);
    }

    public function exercise(){
        return $this->hasMany(Exercise::class);
    }
}

