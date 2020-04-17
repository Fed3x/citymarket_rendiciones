<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rendicion;
use App\UsuarioFlota;


class PDFController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function exportar($id){
        ini_set('max_execution_time', 300); 

        $rendicion = Rendicion::where('id', $id)->with(['detalles.sitio_desde','detalles.sitio_hasta'])->first();
        $flota = UsuarioFlota::where('id_usuario', auth()->user()->id)->with(['auto_marca','auto_modelo'])->first();
        // return $rendicion;
        // return view('PDF.plantilla', compact(
        //     'rendicion',
        // ));



        $pdf = app('dompdf.wrapper');

     
        $pdf = \PDF::loadView('PDF.plantilla', compact(['rendicion','flota']));
     

    
        return $pdf->download('rendicion_' . $rendicion->descripcion . '.pdf');


    }
}
