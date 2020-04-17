<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuariosFlota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_usuarios_flotas', function (Blueprint $table) {
            $table->bigIncrements('id');          

            $table->unsignedBigInteger('id_auto_marca');
            $table->foreign('id_auto_marca')->references('id')->on('org_auto_marcas');

            $table->unsignedBigInteger('id_auto_modelo');
            $table->foreign('id_auto_modelo')->references('id')->on('org_auto_modelos');
            
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('org_usuarios');

            $table->unsignedSmallInteger('año');
            $table->string('matricula', 10);

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
        Schema::dropIfExists('org_usuarios_flotas');
    }
}
