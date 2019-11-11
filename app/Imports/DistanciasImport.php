<?php

namespace App\Imports;

use App\Distancia;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};
use Auth;


class DistanciasImport implements ToModel, WithHeadingRow
{
    use Importable;
    private $rows = 0;
    private $datos = [];
    private $identificadores = [];
    public function model(array $row)
    {
        ++$this->rows;
        array_push(
            $this->datos,['id_sitio_desde' => getID('App\Sitio', 'descripcion' ,  $row['sitio_desde']),
                          'id_sitio_hasta' => getID('App\Sitio', 'descripcion' ,  $row['sitio_hasta']),
                          'kilometraje' => $row['kilometraje'],
                          'creado_el' => '2019-11-07 16:48:34',
                          'creado_por' => Auth::user()->usuario
                          ]
                    );

        $data = new Distancia([
            'id_sitio_desde' => getID('App\Sitio', 'descripcion' ,  $row['sitio_desde']),
            'id_sitio_hasta' => getID('App\Sitio', 'descripcion' ,  $row['sitio_hasta']),
            'kilometraje' => $row['kilometraje'],
            'creado_el' => '2019-11-07 16:48:34',
            'creado_por' => Auth::user()->usuario
        ]);

        array_push($this->identificadores, $data);
        return $data;
        
        

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
