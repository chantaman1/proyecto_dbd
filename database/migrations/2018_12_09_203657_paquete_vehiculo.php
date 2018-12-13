<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaqueteVehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquete_vehiculo', function (Blueprint $table) {
        $table->increments('id');
        $table->date('fecha_inicio');
        $table->time('hora_inicio');
        $table->date('fecha_termino');
        $table->time('hora_termino');
        $table->unsignedInteger('paquete_id');
        $table->unsignedInteger('vehiculo_id');
        $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
        $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_vehiculo');
    }
}
