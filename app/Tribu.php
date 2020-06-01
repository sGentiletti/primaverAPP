<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tribu extends Model
{
    protected $table = 'tribus';

    public function cacique()
    {
        return $this->hasOne('App\User');
    }

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id', 'num_tribu',
    ];
}
