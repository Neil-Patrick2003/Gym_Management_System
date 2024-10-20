<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'program_id'];

    public function program(){
        return $this->belongsTo(Programs::class, 'program_id');
    }

    public function daily_exercise(){
        return $this->hasMany(DailyExercises::class);
    }

}
