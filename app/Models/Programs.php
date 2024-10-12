<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programs extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by', 'photo_link'];

    public function daily_exercise(){
        return $this->hasMany(DailyExercises::class);
    }

    public function user_program(){
        return $this->hasMany(UserProgram::class);
    }

}
