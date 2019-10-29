<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Pais;
use App\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'descripcion' => 'Central',
            'id_pais' => Pais::first()->id,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);

        Departamento::create([
            'descripcion' => 'Concepcion',
            'id_pais' => Pais::first()->id,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);

        Departamento::create([
            'descripcion' => 'Ñeembucu',
            'id_pais' => Pais::first()->id,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);
    }
}
