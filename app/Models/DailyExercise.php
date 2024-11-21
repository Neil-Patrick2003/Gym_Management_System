<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyExercise extends Model
{
    use HasFactory;

    protected $fillable = ['program_schedule_id','exercise_id'];

    public function program_schedule(){
        return $this->hasMany(Exercise::class);
    }

    public function exercise(){
        return $this->hasMany(Exercise::class);
    }


}
