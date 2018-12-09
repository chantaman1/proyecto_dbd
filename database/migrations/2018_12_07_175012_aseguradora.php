<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aseguradora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('aseguradora', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nombre');
         $table->string('direccion');
         $table->string('telefono');
         $table->string('ciudad');
         $table->string('pais');
         $table->string('direccion_web');
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
       Schema::dropIfExists('aseguradora');
    }
}
