<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrgDepartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_departamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 50);

            $table->unsignedBigInteger('id_pais');
            $table->foreign('id_pais')->references('id')->on('org_paises');
            

            $table->timestamp('creado_el');
            $table->string('creado_por', 20);
            $table->timestamp('actualizado_el')->nullable();
            $table->string('actualizado_por', 20)->nullable();
        });
        DB::update("alter sequence org_departamentos_id_seq restart with 10000");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_departamentos');
    }
}
