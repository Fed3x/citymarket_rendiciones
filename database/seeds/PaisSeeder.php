<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use Carbon\Carbon;
use App\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create([
            'descripcion' => 'Paraguay',
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);
        Pais::create([
            'descripcion' => 'Brasil',
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);
    }
}
