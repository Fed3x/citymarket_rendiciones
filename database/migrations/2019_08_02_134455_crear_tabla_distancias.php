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
