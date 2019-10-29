<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Ciudad;
use App\Departamento;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create([
            'descripcion' => 'Asuncion',
            'id_departamento' => Departamento::first()->id,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);

        Ciudad::create([
            'descripcion' => 'Villa Elisa',
            'id_departamento' => Departamento::first()->id,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);

        Ciudad::create([
            'descripcion' => 'Fernando de la Mora',
            'id_departamento' => Departamento::first()->id,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin'
        ]);
    }
}
