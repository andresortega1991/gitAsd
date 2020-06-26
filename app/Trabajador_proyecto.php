<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador_proyecto extends Model
{
    protected $table = 'trabajadores_proyecto';


    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'id_proyecto');
    }
    public function cargo()
    {
        return $this->belongsTo('App\Cargotrabajador');
    }
}