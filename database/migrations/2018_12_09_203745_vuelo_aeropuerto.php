<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VueloAeropuerto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vuelo_aeropuertos', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_vuelo');
        $table->unsignedInteger('id_aeropuerto');
        $table->foreign('id_vuelo')->references('id')->on('vuelos')->onDelete('cascade');
        $table->foreign('id_aeropuerto')->references('id')->on('aeropuertos')->onDelete('cascade');
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
        Schema::dropIfExists('vuelo_aeropuertos');
    }
}
