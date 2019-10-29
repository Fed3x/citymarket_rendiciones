<?php

use Illuminate\Database\Seeder;
use App\Tipo;
use Carbon\Carbon;

class TiposDireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create([
            'descripcion' => 'y',
            'ambito' => 'direcciones',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);

        Tipo::create([
            'descripcion' => 'casi',
            'ambito' => 'direcciones',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);

        Tipo::create([
            'descripcion' => 'entre',
            'ambito' => 'direcciones',
            'creado_por' => 'admin',
            'creado_el' => Carbon::now()
        ]);
    }
}
