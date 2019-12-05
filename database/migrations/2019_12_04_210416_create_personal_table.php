<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_admision');
            $table->string('nombres');
            $table->string('apellidos');
            $table->bigInteger('tipo_documento')->unsigned();
            $table->foreign('tipo_documento')->references('id')->on('tipo_documentos');
            $table->string('numero_documento');
            $table->string('lugar_documento');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('celular');
            $table->string('eps');
            $table->string('pension');
            $table->string('cesantias');
            $table->string('cargo');
            $table->string('riesgo');
            $table->bigInteger('tipo_contrato')->unsigned();
            $table->foreign('tipo_contrato')->references('id')->on('tipo_contratos');
            $table->integer('tipo_duracion');
            $table->string('duracion');
            $table->integer('numero_contrato')->unsigned();
            $table->integer('salario');
            $table->boolean('comision');
            $table->boolean('ppto')->default(0);
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
        Schema::dropIfExists('personal');
    }
}
