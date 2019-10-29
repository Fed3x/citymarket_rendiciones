<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrgSitios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_sitios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion',50);
            $table->string('direccion_uno',100);
            $table->string('direccion_dos',100)->nullable();
            $table->string('direccion_numero', 10)->nullable();
            $table->string('codigo_set', 10)->nullable();


            $table->unsignedBigInteger('id_tipo_sitio');
            $table->foreign('id_tipo_sitio')->references('id')->on('org_tipos');
            $table->unsignedBigInteger('id_tipo_direccion')->nullable();
            $table->foreign('id_tipo_direccion')->references('id')->on('org_tipos');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('org_estados');
            $table->unsignedBigInteger('id_pais');
            $table->foreign('id_pais')->references('id')->on('org_paises');
            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('org_departamentos');
            $table->unsignedBigInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id')->on('org_ciudades');
            
            $table->timestamp('creado_el');
            $table->string('creado_por', 20);
            $table->timestamp('actualizado_el')->nullable();
            $table->string('actualizado_por', 20)->nullable();
        });
        DB::update("alter sequence org_sitios_id_seq restart with 10000");
    }
    public function down()
    {
        Schema::dropIfExists('org_sitios');
    }
}
