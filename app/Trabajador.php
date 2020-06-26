<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';




    public function user()
    {
        return $this->hasMany('App\User', 'id');
    }


    public function userx()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function trabajadorProyecto()
    {
        return $this->belongsTo('App\Trabajador_proyecto', 'trabajador_id');
    }



    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud', 'trabajador_id');
    }

    public function user2()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function solicitudes2()
    {
        return $this->hasMany('App\Solicitud');
    }

}