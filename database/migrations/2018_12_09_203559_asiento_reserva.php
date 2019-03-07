<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsientoReserva extends Migration
{
    public function up()
    {
      Schema::create('asiento_reserva', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('reserva_id');
          $table->unsignedInteger('asiento_id');
          $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
          $table->foreign('asiento_id')->references('id')->on('asientos')->onDelete('cascade');
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
        Schema::dropIfExists('asiento_reserva');
    }
}
