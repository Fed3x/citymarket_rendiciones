<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleRendicion extends Model
{
    protected $table= 'detalles_rendicion';

    protected $fillable = [
    'id_rendicion','id_sitio_desde','id_sitio_hasta', 'kilometraje','actualizado_el','actualizado_por'
    ];
    
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public $timestamps = false; 

    
    public function sitio_desde()
    {
       return $this->belongsTo('App\Sitio', 'id_sitio_desde', 'id');
    }

    public function sitio_hasta()
    {
       return $this->belongsTo('App\Sitio', 'id_sitio_hasta', 'id');
    }
}
