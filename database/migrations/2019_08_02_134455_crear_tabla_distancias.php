<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDistancias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_distancias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('kilometraje', 4, 2);
            $table->unsignedBigInteger('id_sitio_desde');
            $table->foreign('id_sitio_desde')->references('id')->on('org_sitios');

            $table->unsignedBigInteger('id_sitio_hasta');
            $table->foreign('id_sitio_hasta')->references('id')->on('org_sitios');

            $table->timestamp('creado_el');
            $table->string('creado_por', 20);
            $table->timestamp('actualizado_el')->nullable();
            $table->string('actualizado_por', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_distancias');
    }
}
