<?php

use Illuminate\Database\Seeder;
use App\Tipo;
use Carbon\Carbon;

class TiposSitiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'descripcion' => 'Sucursal',
            'ambito' => 'sitios',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);

        Tipo::create([
            'descripcion' => 'Centro de Distribucion',
            'ambito' => 'sitios',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);

        Tipo::create([
            'descripcion' => 'Ocasional',
            'ambito' => 'sitios',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);
    }
}
