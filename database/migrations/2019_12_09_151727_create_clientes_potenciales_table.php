<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesPotencialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_potenciales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ciudad');
            $table->string('razon_social');
            $table->string('nit');
            $table->string('direccion');
            $table->string('pagina_web');
            $table->string('tipo_sociedad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_potenciales');
    }
}
