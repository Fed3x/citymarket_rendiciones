<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table= 'org_usuarios';

    protected $fillable = [
    'usuario', 'email', 'clave','activo','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    protected $hidden = [
        'clave','remember_token'
    ];

    protected $casts = [
        'email_verificacion_el' => 'datetime',
    ];

    public $timestamps = false;
    public function getAuthPassword()
    {
      return $this->clave;
    }

    public function tareas()
    {
        return $this->hasMany('App\Tarea', 'id_usuario', 'id');
    }

    public function usuarios_flotas()
    {
        return $this->hasMany('App\UsuarioFlota', 'id_usuario');
    }

}
