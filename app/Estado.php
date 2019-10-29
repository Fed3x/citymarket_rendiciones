<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table= 'org_estados';

    protected $fillable = [
    'descripcion', 'ambito','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 

    public function sitios()
    {
        return $this->hasMany('App\Sitio', 'id_estado');
    }
}
