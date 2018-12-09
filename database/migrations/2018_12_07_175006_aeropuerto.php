<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aeropuerto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('aeropuerto', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('ciudad');
          $table->string('direccion');
          $table->string('pais',35);//Pais más largo 31 char (republica democratica del congo)
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
        Schema::drop('aeropuerto');
    }
}
