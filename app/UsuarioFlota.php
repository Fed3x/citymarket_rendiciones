<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioFlota extends Model
{
    protected $table= 'org_usuarios_flotas';

    protected $fillable = [
    'id_auto_marca','id_auto_modelo','id_usuario', 'año','matricula','creado_el','creado_por','actualizado_el','actualizado_por'
    ];

    public $timestamps = false; 
    

    public function auto_marca()
    {
        return $this->belongsTo('App\AutoMarca', 'id_auto_marca');
    }

    public function auto_modelo()
    {
        return $this->belongsTo('App\AutoModelo', 'id_auto_modelo');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario');
    }
}
