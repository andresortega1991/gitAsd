<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';



    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

    public function trabajadorx()
    {
        return $this->belongsTo('App\Trabajador', 'trabajador_id');
    }

    public function proyecto2()
    {
        return $this->hasOne('App\Proyecto');
    }
    public function trabajador2()
    {
        return $this->hasOne('App\Trabajador');
    }


    public function user()
    {
        return $this->hasOne('App\User', 'id');
    }
    public function cargo()
    {
        return $this->belongsTo('App\Cargotrabajador','id ');
    }
    public function cargo2()
    {
        return $this->belongsTo('App\Cargotrabajador', 'cargotrabajador_id');
    }
}