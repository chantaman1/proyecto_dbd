<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaqueteReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquete_reserva', function (Blueprint $table) {
        $table->string('fecha_inicio', 30);
        $table->string('fecha_termino', 30);
        $table->unsignedInteger('reserva_id');
        $table->unsignedInteger('paquete_id');
        $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_reserva');
    }
}
