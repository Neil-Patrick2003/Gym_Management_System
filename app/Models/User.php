<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
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
        'paid_until'
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

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
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

}
