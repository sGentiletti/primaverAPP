<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PseudoTribes extends Model
{

    protected $table = 'pseudotribes';


    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cacique_id', 'user_id',
    ];
}
