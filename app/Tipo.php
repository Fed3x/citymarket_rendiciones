<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table= 'org_tipos';

    protected $fillable = [
    'descripcion', 'ambito','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 

    public function tipo_sitios()
    {
        return $this->hasMany('App\Sitio', 'id_tipo_sitio','id');
    }
    public function tipo_direcciones()
    {
        return $this->hasMany('App\Sitio', 'id_tipo_direccion','id');
    }
}
