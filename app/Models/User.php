<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
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
    ];

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

}
