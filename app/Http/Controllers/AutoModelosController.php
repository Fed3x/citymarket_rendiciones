<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AutoModelo;

class AutoModelosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $auto_modelos = AutoModelo::orderBy('id')->get();
        return $auto_modelos;
    }
    public function store(Request $request)
    {
        $auto_modelo = New AutoModelo();
        $auto_modelo->descripcion = $request->descripcion;
        $auto_modelo->id_auto_marca = $request->referencia_padre;
        $auto_modelo->creado_el = Carbon::now();
        $auto_modelo->creado_por = auth()->user()->usuario;
        $auto_modelo->save();
        $id = $auto_modelo->id;
        $nuevo_modelo = AutoModelo::where('id', $id)->get();
        return $nuevo_modelo->last();
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
