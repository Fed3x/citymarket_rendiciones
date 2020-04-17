<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rendicion;


class RendicionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $rendiciones = Rendicion::where('id_usuario',auth()->user()->id)->orderBy('id')->get();
        return $rendiciones;
    }
    public function store(Request $request)
    {
        $rendicion = New Rendicion();
        $rendicion->descripcion = $request->descripcion;
        $rendicion->creado_el = Carbon::now();
        $rendicion->creado_por = auth()->user()->usuario;
        $rendicion->id_usuario = auth()->user()->id;
        $rendicion->save();
        $id = $rendicion->id;
        $nueva_rendicion = Rendicion::where('id', $id)->get();
        
        return $nueva_rendicion->last();
    }

    public function update(Request $request, $id)
    {
        $rendicion = Rendicion::find($id);
        $rendicion->descripcion = $request->descripcion;
        $rendicion->actualizado_el = Carbon::now();
        $rendicion->actualizado_por = auth()->user()->usuario;
        
        $rendicion->save();

        $rendicion = Rendicion::where('id', $id)->get();

        return $rendicion->last();
    }

    public function destroy($id)
    {
        $distancia = Rendicion::findOrFail($id);
        $distancia->delete();
    }
}
