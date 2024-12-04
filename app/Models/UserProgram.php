<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProgram extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daily_exercises()
    {
        return $this->hasMany(UserProgramDailyExercise::class);
    }

    public function program_schedules()
    {
        return $this->hasMany(UserProgramSchedule::class);
    }

    public function scopeAppendCompletionPercentage(Builder $builder)
    {
        $builder
            ->select('*')
            ->selectRaw(
            'CAST(
                              (
                                select
                                  count(*)
                                from
                                  user_program_daily_exercises
                                where
                                  is_complete = true
                                  AND user_program_schedule_id in (
                                    select
                                      id
                                    from
                                      user_program_schedules
                                    where
                                      user_program_schedules.user_program_id = user_programs.id
                                  )
                              ) AS FLOAT
                            ) / NULLIF(
                              CAST(
                                (
                                  select
                                    count(*)
                                  from
                                    user_program_daily_exercises
                                  where
                                    user_program_schedule_id in (
                                      select
                                        id
                                      from
                                        user_program_schedules
                                      where
                                        user_program_schedules.user_program_id = user_programs.id
                                    )
                                ) AS FLOAT
                              ),
                              0
                            ) * 100 AS completion_percentage
        '
        );
    }
}
