<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'trainer_id', 'content', 'created_at', 'rating' ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
