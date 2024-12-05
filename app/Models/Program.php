<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by', 'photo_link', 'level'];

    public function daily_exercise(){
        return $this->hasMany(DailyExercise::class);
    }

    public function user_program(){
        return $this->belongsTo(UserProgram::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function program_schedules(){
        return $this->hasMany(ProgramSchedule::class);
    }

}
