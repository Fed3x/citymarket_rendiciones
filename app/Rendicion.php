<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function detalles()
    {
        return $this->hasMany('App\DetalleRendicion', 'id_rendicion');
    }
}
