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
        Schema::create('org_rendiciones_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('id_rendicion');
            $table->foreign('id_rendicion')->references('id')->on('org_rendiciones');

            $table->unsignedBigInteger('id_sitio_desde');
            $table->foreign('id_sitio_desde')->references('id')->on('org_sitios');

            $table->unsignedBigInteger('id_sitio_hasta');
            $table->foreign('id_sitio_hasta')->references('id')->on('org_sitios');

            $table->string('finalidad', 200);
            $table->double('kilometraje', 4, 2);
            $table->date('fecha');

            $table->timestamp('creado_el');
            $table->string('creado_por', 20);
            $table->timestamp('actualizado_el')->nullable();
            $table->string('actualizado_por', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('org_rendiciones_detalles');
    }
}
