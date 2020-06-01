<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function cacique()
    {
        return $this->belongsTo('App\User', 'parent_id');
    }

    public function indios()
    {
        return $this->hasMany('App\User', 'parent_id');
    }

    public function tribu()
    {
        return $this->hasOne('App\Tribu');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'surname', 'dni', 'gender', 'birthdate', 'address', 'phone', 'school', 'grade', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
