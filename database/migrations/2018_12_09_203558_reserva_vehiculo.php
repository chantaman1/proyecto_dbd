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
      Schema::create('reserva_vehiculo', function (Blueprint $table) {
        $table->date('fecha_inicio');
        $table->time('hora_inicio')->nullable();
        $table->date('fecha_termino');
        $table->time('hora_termino')->nullable();
        $table->unsignedInteger('reserva_id');
        $table->unsignedInteger('vehiculo_id');
        $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
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
        Schema::dropIfExists('reserva_vehiculo');
    }
}
