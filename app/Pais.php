<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table= 'org_paises';

    protected $fillable = [
    'descripcion', 'creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 


   public function departamentos()
    {
        return $this->hasMany('App\Departamento', 'id_pais');
    }
}
