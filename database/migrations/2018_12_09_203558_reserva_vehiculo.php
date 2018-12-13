<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservaVehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reserva_vehiculos', function (Blueprint $table) {
        $table->increments('id');
        $table->date('fecha_inicio');
        $table->time('hora_inicio');
        $table->date('fecha_termino');
        $table->time('hora_termino');
        $table->unsignedInteger('id_reserva');
        $table->unsignedInteger('id_vehiculo');
        $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('id_vehiculo')->references('id')->on('vehiculos')->onDelete('cascade');
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
        Schema::dropIfExists('reserva_vehiculos');
    }
}
