<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservaVuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reserva_vuelo', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('cant_ninos');
        $table->integer('cant_adultos');
        $table->integer('cant_infantes');
        $table->unsignedInteger('id_reserva');
        $table->unsignedInteger('id_vuelo');
        $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete('cascade');
        $table->foreign('id_vuelo')->references('id')->on('vuelo')->onDelete('cascade');
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
        Schema::dropIfExists('reserva_vuelo');
    }
}
