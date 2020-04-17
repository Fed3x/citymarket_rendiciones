<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoModelo extends Model
{
    protected $table= 'org_auto_modelos';

    protected $fillable = [
    'descripcion','id_auto_marca','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    

    public $timestamps = false; 

    
    public function auto_marca()
    {
       return $this->belongsTo('App\AutoMarca', 'id_auto_marca');
    }

    public function usuarios_flotas()
    {
        return $this->hasMany('App\UsuarioFlota', 'id_auto_modelo');
    }
}
