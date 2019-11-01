<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetallesRendicion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_rendicion', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('id_rendicion');
            $table->foreign('id_rendicion')->references('id')->on('rendiciones');


            $table->unsignedBigInteger('id_sitio_desde');
            $table->foreign('id_sitio_desde')->references('id')->on('org_sitios');

            $table->unsignedBigInteger('id_sitio_hasta');
            $table->foreign('id_sitio_hasta')->references('id')->on('org_sitios');

            $table->double('kilometraje', 4, 2);

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
        Schema::dropIfExists('detalles_rendicion');
    }
}
