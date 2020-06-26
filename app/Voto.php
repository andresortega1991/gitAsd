<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $table = 'votos';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'proyecto_id');
    }
}