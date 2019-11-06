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
        $detalles = DetalleRendicion::where('id_rendicion', $id)->get();
        return $detalles;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
