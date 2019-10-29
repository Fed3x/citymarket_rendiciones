<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pais;
use App\Departamento;
use App\Ciudad;
use App\Sitio;
use App\Estado;
use App\Tipo;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function dataSitios()
    {
        // $paises = Genero::where('dominio', 'Genero')->orderBy('descripcion_larga', 'asc')->get();
        // $estados = Genero::where('dominio', 'Estado Civil')->orderBy('descripcion_larga', 'asc')->get();
        // $tipos = Tipo_Documento::all()->sortBy("descripcion");
        // $departamentos = Provincia_Departamento::all()->sortBy("descripcion");
        $paises = Pais::all()->sortBy("descripcion");
        $departamentos = Departamento::all()->sortBy("descripcion");
        $ciudades = Ciudad::all()->sortBy("descripcion");
        $sitio_seq = DB::select( DB::raw("SELECT last_value as valor FROM org_sitios_id_seq"));
        $estados = Estado::all()->where('ambito', 'sitios');
        $tipo_sitios = Tipo::all()->where('ambito', 'sitios');
        $tipo_direcciones = Tipo::all()->where('ambito', 'direcciones');

        return (['paises' => $paises,
                 'departamentos' => $departamentos,
                 'ciudades' => $ciudades,
                 'sitio' => $sitio_seq,
                 'estados' => $estados,
                 'tipo_sitios' => $tipo_sitios,
                 'tipo_direcciones' => $tipo_direcciones
                ]);
    }
}
