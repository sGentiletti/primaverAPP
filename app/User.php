<?php

namespace App;

use App\Notifications\AgregadoPorCaciqueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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
        'name', 'parent_id', 'surname', 'dni', 'gender', 'birthdate', 'address', 'city', 'between_streets', 'phone', 'cel', 'school', 'grade', 'email', 'password',
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

    public function sendEmailVerificationNotificationToIndio()
    {
        /* What the hell is this?: Esta función cumple la misma función que la stock de Laravel llamada "sendEmailVerificationNotification()". Querés deshacerte de ésto? Borralo, no pasa nada, vuelve a tomar la funcion stock. Aseguraet que en el controlador de Usuario ya no esté llamando acá porque sino va a explotar y acordate que esto trabaja con una Notification, borrala si ya no la vas a usar más. Te dejo un video de dónde saqué esta idea genial: https://www.youtube.com/watch?v=c01k5Zo_CuI 
        */
        $this->notify(new AgregadoPorCaciqueNotification($this->name)); //Le pasamos el nombre para setearlo en el constructor de la notificacion.   
    }
}
