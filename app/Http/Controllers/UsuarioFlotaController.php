<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioFlota;
use Carbon\Carbon;

class UsuarioFlotaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario_flota = UsuarioFlota::where('id_usuario',auth()->user()->id)->first();
        return $usuario_flota;
    }
    public function store(Request $request)
    {
        $usuario_flota = New UsuarioFlota();
        $usuario_flota->id_auto_marca = $request->id_marca;
        $usuario_flota->id_auto_modelo = $request->id_modelo;
        $usuario_flota->matricula = $request->matricula;
        $usuario_flota->año = $request->año;
        $usuario_flota->id_usuario = auth()->user()->id;
        $usuario_flota->creado_el = Carbon::now();
        $usuario_flota->creado_por = auth()->user()->usuario;
        $usuario_flota->save();
        return $usuario_flota;
    }

    public function update(Request $request, $id)
    {
        $usuario_flota = UsuarioFlota::find($id);
        $usuario_flota->id_auto_marca = $request->id_marca;
        $usuario_flota->id_auto_modelo = $request->id_modelo;
        $usuario_flota->matricula = $request->matricula;
        $usuario_flota->año = $request->año;
        $usuario_flota->actualizado_el = Carbon::now();
        $usuario_flota->actualizado_por = auth()->user()->usuario;
        $usuario_flota->save();
        return $usuario_flota;
    }

    public function destroy($id)
    {
        $distancia = Rendicion::findOrFail($id);
        $distancia->delete();
    }
}
