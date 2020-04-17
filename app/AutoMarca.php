<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoMarca extends Model
{
    protected $table= 'org_auto_marcas';

    protected $fillable = [
    'descripcion', 'creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 


   public function auto_modelos()
    {
        return $this->hasMany('App\AutoModelo', 'id_auto_marca');
    }


    public function usuarios_flotas()
    {
        return $this->hasMany('App\UsuarioFlota', 'id_auto_marca');
    }
}
