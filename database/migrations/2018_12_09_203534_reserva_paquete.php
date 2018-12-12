<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservaPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reserva_paquetes', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_reserva');
        $table->unsignedInteger('id_paquete');
        $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('id_paquete')->references('id')->on('paquetes')->onDelete('cascade');
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
        Schema::dropIfExists('reserva_paquetes');
    }
}
