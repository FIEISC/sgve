<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_grupo');
            $table->integer('semestre');

            //Llaves foraneas!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $table->integer('viaje_id')->unsigned();
            $table->foreign('viaje_id')->references('id')->on('viajes')->onDelte('cascade');

            $table->integer('ciclo_id')->unsigned();
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');

            $table->integer('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->integer('plantel_id')->unsigned();
            $table->foreign('plantel_id')->references('id')->on('planteles')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
