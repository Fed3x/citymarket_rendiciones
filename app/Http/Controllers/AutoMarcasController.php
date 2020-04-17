<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AutoMarca;

class AutoMarcasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $auto_marcas = AutoMarca::orderBy('id')->get();
        return $auto_marcas;
    }
    public function store(Request $request)
    {
        $auto_marca = New AutoMarca();
        $auto_marca->descripcion = $request->descripcion;
        $auto_marca->creado_el = Carbon::now();
        $auto_marca->creado_por = auth()->user()->usuario;
        $auto_marca->save();
        $id = $auto_marca->id;
        $nueva_marca = AutoMarca::where('id', $id)->get();
        return $nueva_marca->last();
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $distancia = Rendicion::findOrFail($id);
        $distancia->delete();
    }
}
