<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distancia extends Model
{
    protected $table= 'org_distancias';

    protected $fillable = [
    'id_sitio_desde', 'id_sitio_hasta','kilometraje'
    ];
    

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
