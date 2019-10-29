<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sitio;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitiosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $sitios = Sitio::orderBy('descripcion')->get();
        return $sitios->each(function ($sitio){
                $sitio->tipo_sitio;
                $sitio->tipo_direccion;
                $sitio->estado;
            });
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'direccion_uno' => 'required',
            'estado' => 'required',
            'tipo_sitio' => 'required',
            'pais' => 'required',
            'ciudad' => 'required',
            'departamento' => 'required',
            
        ]);

        $sitio = new Sitio();
        $sitio->descripcion = $request->descripcion;
        $sitio->direccion_uno = $request->direccion_uno;
        $sitio->direccion_dos = $request->direccion_dos;
        $sitio->direccion_numero = $request->numero;
        $sitio->codigo_set = $request->codigo_set;
        $sitio->id_estado = $request->estado;
        $sitio->id_tipo_sitio = $request->tipo_sitio;
        $sitio->id_tipo_direccion = $request->tipo_direccion;
        $sitio->id_pais = $request->pais;
        $sitio->id_ciudad = $request->ciudad;
        $sitio->id_departamento = $request->departamento;
        $sitio->creado_el = Carbon::now();
        $sitio->creado_por = auth()->user()->usuario;
        $sitio->save();
        $id = $sitio->id;
        
        $nuevo_sitio = Sitio::where('id', $id)->with(['tipo_sitio','tipo_direccion','estado'])->get();
  
        return $nuevo_sitio->last();
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'direccion_uno' => 'required',
            'estado' => 'required',
            'tipo_sitio' => 'required',
            'pais' => 'required',
            'ciudad' => 'required',
            'departamento' => 'required',
            
        ]);
        
        $sitio = Sitio::find($id);
        $sitio->descripcion = $request->descripcion;
        $sitio->direccion_uno = $request->direccion_uno;
        $sitio->direccion_dos = $request->direccion_dos;
        $sitio->direccion_numero = $request->numero;
        $sitio->codigo_set = $request->codigo_set;
        $sitio->id_estado = $request->estado;
        $sitio->id_tipo_sitio = $request->tipo_sitio;
        $sitio->id_tipo_direccion = $request->tipo_direccion;
        $sitio->id_pais = $request->pais;
        $sitio->id_ciudad = $request->ciudad;
        $sitio->id_departamento = $request->departamento;
        $sitio->actualizado_el = Carbon::now();
        $sitio->actualizado_por = auth()->user()->usuario;
        $sitio->save();

        $index = $request->index;
        $sitio = Sitio::where('id', $id)->with(['tipo_sitio','tipo_direccion','estado'])->get();
        

        return compact(['sitio','index']);
    }
    public function destroy($id)
    {
        $sitio = Sitio::findOrFail($id);
        $sitio->delete();
    }
}
