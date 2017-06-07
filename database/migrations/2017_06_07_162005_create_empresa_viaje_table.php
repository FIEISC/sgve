<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaViajeTable extends Migration
{
    public function up()
    {
        Schema::create('empresa_viaje', function (Blueprint $table) {
            $table->increments('id');

            //Llaves foraneas!!!!!!!!!!!!!!!!!!!!!!!!!!
            $table->integer('viaje_id')->unsigned();
            $table->foreign('viaje_id')->references('id')->on('viajes')->onDelete('cascade');

            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresa_viaje');
    }
}
