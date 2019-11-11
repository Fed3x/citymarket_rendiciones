<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleRendicion;

class RendicionDetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $detalles = DetalleRendicion::where('id_rendicion', $id)->orderBy('id', 'asc')->get();
        return $detalles->each(function ($detalle){
            $detalle->sitio_desde;
            $detalle->sitio_hasta;
        });
    }

    public function update(Request $request, $id)
    {
        $detalle = DetalleRendicion::find($id);
        $detalle->id_sitio_desde = $request->id_sitio_desde;
        $detalle->id_sitio_hasta = $request->id_sitio_hasta;
        $detalle->kilometraje = $request->kilometraje;
        $detalle->save();
        $id = $detalle->id;

        $nuevo_detalle = DetalleRendicion::where('id', $id)->with(['sitio_desde','sitio_hasta'])->get();

        return $nuevo_detalle->last();
    }

    public function destroy($id)
    {
        //
    }
}
