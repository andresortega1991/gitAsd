<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    //Metodos de Relacion de one to many-- uno a muchos :)
    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

    public function votos()
    {
        return $this->hasMany('App\Voto');
    }
    public function trabajadores()
    {
        return $this->hasMany('App\Trabajador_proyecto');
    }

   

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }

    //Metodo de Relacion de many to one-- muchos a uno  :)




    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function alcance()
    {
        return $this->belongsTo('App\Alcance');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria_proyecto');
    }

    public function donaciones()
    {
        return $this->hasMany('App\Donacion', 'proyecto_id');
    }

    public function cargos()
    {
        return $this->hasMany('App\Cargotrabajador', 'proyecto_id');
    }

    public function solicitudesx()
    {
        return $this->hasMany('App\Solicitud', 'proyecto_id');
    }
    

    
    public function trabajadoresx()
    {
        return $this->hasMany('App\Trabajador_proyecto', 'proyecto_id');
    }

}