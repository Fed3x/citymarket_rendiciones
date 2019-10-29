<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrgCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_ciudades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 50);

            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('org_departamentos');
            

            $table->timestamp('creado_el');
            $table->string('creado_por', 20);
            $table->timestamp('actualizado_el')->nullable();
            $table->string('actualizado_por', 20)->nullable();
        });
        DB::update("alter sequence org_ciudades_id_seq restart with 10000");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_ciudades');
    }
}
