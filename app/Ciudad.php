<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table= 'org_ciudades';

    protected $fillable = [
    'descripcion','id_departamento','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    

    public $timestamps = false; 
    public function departamento()
    {
       return $this->belongsTo('App\Departamento', 'id_departamento');
    }
}
