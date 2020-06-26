<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donaciones';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto', 'id_proyecto');
    }
}