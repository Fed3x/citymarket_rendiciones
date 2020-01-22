<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOrgAutoModelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_auto_modelos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('descripcion', 50);

            $table->unsignedBigInteger('id_auto_marca');
            $table->foreign('id_auto_marca')->references('id')->on('org_auto_marcas');

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
        Schema::dropIfExists('org_auto_modelos');
    }
}
