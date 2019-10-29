<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    protected $table= 'org_sitios';

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
    public function departamento()
    {
       return $this->belongsTo('App\Departamento', 'id_departamento', 'id');
    }
    public function ciudad()
    {
       return $this->belongsTo('App\Ciudad', 'id_ciudad', 'id');
    }
    public function pais()
    {
       return $this->belongsTo('App\Pais', 'id_pais', 'id');
    }
    public function tipo_sitio()
    {
       return $this->belongsTo('App\Tipo', 'id_tipo_sitio','id');
    }
   public function tipo_direccion()
   {
      return $this->belongsTo('App\Tipo','id_tipo_direccion');
   }
   public function estado()
   {
      return $this->belongsTo('App\Estado','id_estado');
   }

   public function distancia_desde()
   {
       return $this->hasMany('App\Distancia', 'id_sitio_desde');
   }

   public function distancia_hasta()
   {
       return $this->hasMany('App\Distancia', 'id_sitio_hasta');
   }
}
