<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration
{
    public function up()
    {
        Schema::create('org_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario',20);
            $table->string('email')->unique();
            $table->timestamp('verificacion_email_el')->nullable();
            $table->string('clave');
            $table->boolean('activo')->default(TRUE);
            $table->rememberToken();

            $table->timestamp('creado_el');
            $table->string('creado_por', 20);
            $table->timestamp('actualizado_el')->nullable();
            $table->string('actualizado_por', 20)->nullable();

        });
    }
    public function down()
    {
        Schema::dropIfExists('org_usuarios');
    }
}
