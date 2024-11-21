<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProgram extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'program_id'];

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function daily_exercises(){
        return $this->hasMany(UserProgramDailyExercise::class);
    }

    public function program_schedules(){
        return $this->hasMany(UserProgramSchedule::class);
    }
}
