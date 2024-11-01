<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgramSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_program_id'];


}

