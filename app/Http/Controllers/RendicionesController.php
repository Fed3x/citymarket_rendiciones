<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rendicion;


class RendicionesController extends Controller
{

    public function index()
    {
        
    }
    public function store(Request $request)
    {
        return $request;
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
