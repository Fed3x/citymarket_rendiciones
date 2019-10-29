<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use Carbon\Carbon;

class TareasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return Tarea::where('id_usuario',auth()->id())->orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $tarea = new Tarea();
        $tarea->descripcion = $request->descripcion;
        $tarea->creado_el = Carbon::now();
        $tarea->creado_por = auth()->user()->usuario;
        $tarea->id_usuario = auth()->user()->id;
        $tarea->save();

        return $tarea;
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->descripcion = $request->descripcion;
        $tarea->actualizado_el = Carbon::now();
        $tarea->actualizado_por = auth()->user()->usuario;
        $tarea->save();
        return $tarea;
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
    }
}


