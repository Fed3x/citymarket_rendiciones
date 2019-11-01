<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRendiciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendiciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 50);




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
        Schema::dropIfExists('rendiciones');
    }
}
