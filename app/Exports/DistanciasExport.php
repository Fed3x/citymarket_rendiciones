<?php

namespace App\Exports;

use App\Distancia;
use Maatwebsite\Excel\Concerns\{FromQuery, Exportable, WithHeadings, WithMapping,ShouldAutoSize};

class DistanciasExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    public function query()
    {
        return $distancias =  Distancia::with('sitio_desde', 'sitio_hasta');
        
    }
    public function headings(): array
    {
        return [
            '#',
            'Sitio Desde',
            'Sitio Hasta',
            'Kilometraje',
        ];
    }
    public function map($distancia): array
    {
        return [
            $distancia->id,
            $distancia->sitio_desde->descripcion,
            $distancia->sitio_hasta->descripcion,
            $distancia->kilometraje
        ];
    }
}
