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
        $rendicion = New Rendicion();
        $rendicion->descripcion = $request->descripcion;
        $rendicion->creado_el = Carbon::now();
        $rendicion->creado_por = auth()->user()->usuario;
        $rendicion->save();
        $id = $rendicion->id;
        $nueva_rendicion = Rendicion::where('id', $id)->get();
        
        return $nueva_rendicion->last();
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
