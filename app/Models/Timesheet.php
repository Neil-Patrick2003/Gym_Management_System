<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_time', 'trainer_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
