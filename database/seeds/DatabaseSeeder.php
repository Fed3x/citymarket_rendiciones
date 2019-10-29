<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdministradorSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(TiposDireccionesSeeder::class);
        $this->call(TiposSitiosSeeder::class);
        $this->call(EstadosSeeder::class);
    }
}
