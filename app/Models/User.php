<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'about_me',
        'paid_until',
        'photo_url'
    ];


    protected $appends = ['is_paid_today'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function trainingAppointment(): HasMany
    {
        return $this->hasMany(Appointment::class, 'trainer_id');
    }

    public function Recommendation()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function timesheet()
    {
        return $this->hasMany(Appointment::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function getDaysSinceJoinedAttribute()
    {
        return Carbon::parse($this->created_at)->diffInDays(Carbon::now());
    }

    public function tutorial(){
        return $this->hasMany(Tutorial::class);
    }

    public function getIsPaidTodayAttribute()
    {
        return $this->paid_until
            && Carbon::parse($this->paid_until)
                ->greaterThanOrEqualTo(Carbon::now());
    }

    public function setAdditionalPaidUntil(int $days)
    {
        $paid_until = $this->paid_until ? Carbon::parse($this->paid_until) : Carbon::now();

        $this->paid_until = $paid_until->add($days - 1, 'days');
        $this->save();
    }

    public function scopeAvailableTrainer(Builder $builder)
    {
        $now = Carbon::now();


        $builder->where('role', 'Trainer')
            ->whereDoesntHave('supervisingSessions', function (Builder $query) {
                $query->whereNull('end_time');
            })
            ->whereDoesntHave('trainingAppointment', function (Builder $query) use ($now) {
                $query->where('start_time', '<=', $now)
                    ->where('end_date', '>=', $now)
                    ->where('status', 'Accepted');
            });
    }

    public function supervisingSessions(): HasMany
    {
        return $this->hasMany(Timesheet::class, 'trainer_id');
    }

    public function scopeMember(Builder $builder): Builder
    {
        return $builder->where('role', 'Member');
    }

    public function scopeTrainer(Builder $builder): Builder
    {
        return $builder->where('role', 'Trainer');
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder
            ->whereNotNull('paid_until')
            ->where('paid_until', '>=', Carbon::now());
    }

    public function scopeInactive(Builder $builder): Builder
    {
        return $builder->where(function (Builder $query) {
            $query->whereNull('paid_until')
                ->orWhere('paid_until', '<', Carbon::now());
        });
    }

    public function scopeJoinedToday(Builder $builder): Builder
    {
        return $builder->whereDate('created_at', Carbon::now());
    }

}
