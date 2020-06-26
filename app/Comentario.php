<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'proyecti_id');
    }
}