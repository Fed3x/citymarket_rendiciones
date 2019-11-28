<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sitio;
use App\Distancia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Imports\DistanciasImport;
use App\Exports\DistanciasExport;
use Excel;
use Auth;


class DistanciasController extends Controller
{
    public function index()
    {
        $distancias = Distancia::orderBy('id', 'asc')->get();

        return $distancias->each(function ($distancia){
                $distancia->sitio_desde;
                $distancia->sitio_hasta;
            });
    }

    public function store(Request $request)
    {
        $distancia = new Distancia();
        $distancia->id_sitio_desde = $request->id_sitio_desde;
        $distancia->id_sitio_hasta = $request->id_sitio_hasta;
        $distancia->kilometraje = $request->kilometraje;
        $distancia->creado_el = Carbon::now();
        $distancia->creado_por = Auth::user()->usuario;
        $distancia->save();
        $id = $distancia->id;

        $nueva_distancia = Distancia::where('id', $id)->with(['sitio_desde','sitio_hasta'])->get();

        return $nueva_distancia->last();
    }
    public function update(Request $request, $id)
    {
        $distancia = Distancia::find($id);
        $distancia->id_sitio_desde = $request->id_sitio_desde;
        $distancia->id_sitio_hasta = $request->id_sitio_hasta;
        $distancia->kilometraje = $request->kilometraje;
        $distancia->save();
        $id = $distancia->id;

        $nueva_distancia = Distancia::where('id', $id)->with(['sitio_desde','sitio_hasta'])->get();

        return $nueva_distancia->last();
    }
    public function destroy($id)
    {
        $distancia = Distancia::findOrFail($id);
        $distancia->delete();
    }

    public function buscar(Request $request){
        $id_sitio_desde = $request->id_sitio_desde;
        $id_sitio_hasta = $request->id_sitio_hasta;

        $kilometraje = Distancia::select('kilometraje')
                        ->where([['id_sitio_desde','=',$id_sitio_desde],['id_sitio_hasta','=', $id_sitio_hasta]])
                        ->orWhere([['id_sitio_desde','=',$id_sitio_hasta],['id_sitio_hasta','=', $id_sitio_desde]])
                        ->first();
        return $kilometraje;
    }

    public function import(Request $request)
    {
        $this->validate($request,[
            'file' => 'required|mimes:xls'
        ]);
        $importados = new DistanciasImport;
        $importados->import(request()->file('file'));

        $nueva_distancia = Distancia::whereIn('id', $importados->getIdentificadores())->with(['sitio_desde','sitio_hasta'])->get();
        return $nueva_distancia;
    }

    public function export(){
        
      return (new DistanciasExport)->download('distancias_export.xlsx');
        
    }
}
