<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargotrabajador extends Model
{
    protected $table = 'cargotrabajador';



    public function tp()
    {
        return $this->hasMany('App\Trabajador_proyecto', 'cargo_id');
    }

    public function solictudes()
    {
        return $this->hasMany('App\Solicitud', 'cargotrabajador_id');
    }
}