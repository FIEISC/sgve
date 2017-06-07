<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantelesTable extends Migration
{
    public function up()
    {
        Schema::create('planteles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_plantel');
            $table->string('siglas');

            //Llave foranea de campus!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $table->integer('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campus')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('planteles');
    }
}
