<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'trainer_id', 'start_time', 'end_time', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}