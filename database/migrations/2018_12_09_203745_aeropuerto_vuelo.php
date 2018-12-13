<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeropuertoVuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('aeropuerto_vuelo', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('vuelo_id');
        $table->unsignedInteger('aeropuerto_id');
        $table->foreign('vuelo_id')->references('id')->on('vuelos')->onDelete('cascade');
        $table->foreign('aeropuerto_id')->references('id')->on('aeropuertos')->onDelete('cascade');
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
        Schema::dropIfExists('aeropuerto_vuelo');
    }
}
