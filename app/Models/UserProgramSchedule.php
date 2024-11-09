<?php

namespace App\Models;

use App\Models\UserProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProgramSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_program_id'];


    public function user_program()
    {
        return $this->belongsTo(UserProgram::class, foreignKey: 'user_program_id');
    }

    public function user_daily_exercise()
    {
        return $this->hasMany(UserProgramDailyExercise::class, 'user_program_schedule_id');
    }


    public function exercises() {
        return $this->belongsToMany(Exercise::class, 'user_program_daily_exercises', foreignPivotKey: 'user_program_schedule_id', relatedPivotKey: 'exercise_id')
        ->withPivot('is_complete');
    }

}


