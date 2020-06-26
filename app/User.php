<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'surname', 'surname2', 'date', 'email', 'password', 'tipo_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function proyecto()
    {
        return $this->hasMany('App\Proyecto');
    }
    public function votos()
    {
        return $this->hasMany('App\Voto');
    }


    public function mensajesIn()
    {
        return $this->hasMany('App\Chat');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }



    public function mensajesOut()
    {
        return $this->hasMany('App\Chat');
    }


    public function trabajador2()
    {
        return $this->hasMany('App\Trabajador', 'user_id');
    }
    public function trabajador3()
    {
        return $this->hasMany('App\Trabajador');
    }


    public function donaciones()
    {
        return $this->hasMany('App\Donacion');
    }

    public function chatIn()
    {
        return $this->hasMany('App\Chat', 'id_usuario_receptor');
    }

    public function chatOut()
    {
        return $this->hasMany('App\Chat', 'id_usuario_emisor');
    }
}