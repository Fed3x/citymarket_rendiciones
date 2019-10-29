<?php

use Illuminate\Database\Seeder;
use App\Estado;
use Carbon\Carbon;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'descripcion' => 'Activo',
            'ambito' => 'sitios',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);

        Estado::create([
            'descripcion' => 'Inactivo',
            'ambito' => 'sitios',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);
    }
}
