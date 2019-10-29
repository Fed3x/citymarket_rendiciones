<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReiniciarClaves extends Migration
{
    public function up()
    {
        Schema::create('org_reiniciar_claves', function (Blueprint $table) {
            $table->string('email')->index();       
            $table->string('token');
            $table->timestamp('creado_el')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('org_reiniciar_claves');
    }
}
