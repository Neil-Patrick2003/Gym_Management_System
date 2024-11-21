<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'plan', 'status', 'startDate', 'end_date', 'is_student'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
