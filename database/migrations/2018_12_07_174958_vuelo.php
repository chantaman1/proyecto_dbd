<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vuelos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('tipo', 40);
          $table->string('ciudad_origen', 100);
          $table->string('pais_origen', 35);
          $table->string('codigo');
          $table->string('ciudad_destino', 100);
          $table->string('pais_destino', 35);
          $table->date('fecha');
          $table->time('hora');
          $table->unsignedInteger('aerolinea_id');
          $table->foreign('aerolinea_id')->references('id')->on('aerolineas')->onDelete('cascade');
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
        Schema::dropIfExists('vuelos');
    }
}
