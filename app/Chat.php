<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';


    public function user()
    {
        return $this->belongsTo('App\User', 'id_usuario_receptor');
    }
    public function user2()
    {
        return $this->belongsTo('App\User', 'id_usuario_emisor');
    }
}