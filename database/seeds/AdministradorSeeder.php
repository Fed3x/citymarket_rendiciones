<?php

use Illuminate\Database\Seeder;
use App\Usuario;
use Carbon\Carbon;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'usuario' => 'admin',
            'email' => 'admin@admin.com',
            'clave' => Hash::make('admin'),
            'activo' => TRUE,
            'creado_el' => Carbon::now(),
            'creado_por' => 'admin',

        ]);
    }
}
