<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table= 'tareas';

    protected $fillable = [
    'descripcion','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 
    public function usuario()
    {
       return $this->hasMany('App\Usuario', 'id', 'id_usuario');
    }
}
