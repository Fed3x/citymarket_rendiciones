<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rendicion;


class PDFController extends Controller
{
    public function exportar($id){
        ini_set('max_execution_time', 300); 

        $rendicion = Rendicion::where('id', $id)->with(['detalles.sitio_desde','detalles.sitio_hasta'])->first();
        // return $rendicion;
        // return view('PDF.plantilla', compact(
        //     'rendicion',
        // ));



        $pdf = app('dompdf.wrapper');

     
        $pdf = \PDF::loadView('PDF.plantilla', compact('rendicion'));
     

    
        return $pdf->download('rendicion_' . $rendicion->descripcion . '.pdf');


    }
}
