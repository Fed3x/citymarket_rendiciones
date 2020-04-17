<?php

namespace App\Imports;

use App\Distancia;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Validator;


use Auth;


class DistanciasImport implements ToModel, WithValidation, SkipsOnFailure, WithHeadingRow
{
    use Importable, SkipsFailures;
    private $rows = 0;
    private $datos = [];
    private $identificadores = [];
    public function model(array $row)
    {
        ++$this->rows;
        
        $existe = Distancia::where([['id_sitio_desde', '=', getID('App\Sitio', 'descripcion' ,  $row['sitio_desde'])],['id_sitio_hasta', '=',  getID('App\Sitio', 'descripcion' ,  $row['sitio_hasta'])]])
                        ->orWhere([['id_sitio_desde', '=', getID('App\Sitio', 'descripcion' ,  $row['sitio_hasta'])],['id_sitio_hasta', '=',  getID('App\Sitio', 'descripcion' ,  $row['sitio_desde'])]])
                        ->exists();
        
        if(!$existe){
            $data = new Distancia([
                'id_sitio_desde' => getID('App\Sitio', 'descripcion' ,  $row['sitio_desde']),
                'id_sitio_hasta' => getID('App\Sitio', 'descripcion' ,  $row['sitio_hasta']),
                'kilometraje' => $row['kilometraje'],
                'creado_el' => Carbon::now(),
                'creado_por' => Auth::user()->usuario
            ]);

    
            array_push($this->identificadores, $data);
            
            return $data;
            
        }
        

    
    }

    public function rules(): array
    {
        
        return [
            'sitio_desde' => 'required|string|exists:org_sitios,descripcion',
            'sitio_hasta' => 'required|string|exists:org_sitios,descripcion',
            'kilometraje' => 'required|numeric|min:1'
            
        ];
        

            


        
    }

    public function customValidationMessages()
    {
        return [
            '*.exists' => 'El campo :attribute no existe',
            '*.required' => 'El campo :attribute es requerido',
            '*.numeric' => 'El campo :attribute debe ser numerico',
            '*.string' => 'El campo :attribute debe ser cadena de texto',
            '*.min' => 'El campo :attribute debe ser mayor a 0'
        ];
    }


    public function getRowCount(): int
    {
        return $this->rows;
    }
    public function getData(): array
    {
        return $this->datos;
    }
    public function getIdentificadores(): array
    {
        $id = [];

        foreach ($this->identificadores as $identificador) {
            array_push($id, $identificador->id);
        }

        return $id;
    }
}
