<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_alumno');
            $table->string('no_cuenta')->unique();
            /*$table->integer('semestre');*/
            $table->string('nom_padre');
            $table->string('tel_padre');
            $table->string('no_imss');

            //Llaves foraneas de plantel y carrera!!!!!!!!!!!!!!!!!!!!!!
            $table->integer('plantel_id')->unsigned();
            $table->foreign('plantel_id')->references('id')->on('planteles')->onDelete('cascade');

            $table->integer('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
