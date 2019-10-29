<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table= 'org_departamentos';

    protected $fillable = [
    'descripcion','id_pais','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 

    
    public function pais()
    {
       return $this->belongsTo('App\Pais', 'id_pais');
    }

    public function ciudades()
    {
        return $this->hasMany('App\Ciudad', 'id_departamento');
    }

}
