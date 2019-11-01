<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendicion extends Model
{
    protected $table= 'rendiciones';

    protected $fillable = [
    'descripcion','creado_el','creado_por','actualizado_el','actualizado_por'
    ];
    
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public $timestamps = false; 
}
