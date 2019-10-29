<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sitio_SQLSRV;
use App\Sitio;
use App\Estado;
use App\Pais;
use App\Ciudad;
use App\Departamento;
use App\Tipo;
use Carbon\Carbon;

class SitiosSQLSRVController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function importar(){

        $actual = Sitio::pluck('id')->toArray();
        $sitios_sql = Sitio_SQLSRV::whereNotIn('Identificador', $actual)->get();
        $sitios_sql->each(function ($sitio_sql, $key){
            $sitio = New Sitio();
            $sitio->id = $sitio_sql->Identificador;
            $sitio->descripcion = $sitio_sql->Descripcion;
            $sitio->direccion_uno = 'Modificar Direccion!!';
            $sitio->id_estado = Estado::where('descripcion','Activo')->first()->id;
            $sitio->codigo_set = $sitio_sql->Codigo_Set;
            $sitio->id_pais = Pais::where('descripcion','Paraguay')->first()->id;
            $sitio->id_departamento = Departamento::where('descripcion','Central')->first()->id;
            $sitio->id_ciudad = Ciudad::where('descripcion','Asuncion')->first()->id;
            $sitio->creado_el = Carbon::now();
            $sitio->creado_por = 'admin';
            if(substr_compare("$sitio_sql->Descripcion","CENTRO", 0,5)===0){
                $sitio->id_tipo_sitio = Tipo::where('descripcion','Centro de Distribucion')->first()->id;
            }else{
                $sitio->id_tipo_sitio = Tipo::where('descripcion','Sucursal')->first()->id;
            }
            $sitio->save();
        });

    }
}
