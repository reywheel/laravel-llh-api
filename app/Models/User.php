<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parameter() {
        return $this->hasOne(Parameter::class);
    }

    public function personalData() {
        return $this->hasOne(PersonalData::class);
    }

    public function sleepData() {
        return $this->hasMany(SleepData::class);
    }

    public function pulseData() {
        return $this->hasMany(PulseData::class);
    }

    public function arterialPressureData() {
        return $this->hasMany(ArterialPressureData::class);
    }

    public function temperatureData() {
        return $this->hasMany(TemperatureData::class);
    }
}
