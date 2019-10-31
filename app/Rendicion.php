<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendicion extends Model
{
    protected $table= '';

    protected $fillable = [
    'descripcion', 'direccion_uno','direccion_dos','codigo',
    'id_departamento','id_ciudad','id_pais','id_estao','id_tipo',
    'creado_el','creado_por','actualizado_el','actualizado_por'
    ];
    
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public $timestamps = false; 
}
