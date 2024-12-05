<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_time', 'trainer_id' , 'end_time'];

    protected $appends = ['difference'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getDifferenceAttribute(): string
    {
        if (!$this->end_time) {
            return "On-going";
        }

        $start = Carbon::parse($this->start_time);
        $end = Carbon::parse($this->end_time);

        return str_replace(" before", "", $start->diffForHumans($end));
    }
}
