<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function daily_exercise()
    {
        return $this->hasMany(DailyExercise::class, 'program_schedule_id');
    }

    public function exercises() {
        return $this->belongsToMany(Exercise::class, 'daily_exercises', foreignPivotKey: 'program_schedule_id', relatedPivotKey: 'exercise_id');
    }
}
