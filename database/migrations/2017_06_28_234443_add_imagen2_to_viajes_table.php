<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagen2ToViajesTable extends Migration
{
    public function up()
    {
        Schema::table('viajes', function (Blueprint $table) {
            $table->string('imagen2')->after('imagen1')->default('default.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viajes', function (Blueprint $table) {
            //
        });
    }
}
