<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'no_of_sets', 'no_of_reps', 'description', 'tutorial_link', 'photo_link'];

    public function daily_exercise(){
        return $this->belongsTo(DailyExercise::class);
    }

}
