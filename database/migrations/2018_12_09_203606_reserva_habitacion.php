<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservaHabitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reserva_habitacions', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_reserva');
        $table->unsignedInteger('id_habitacion');
        $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('id_habitacion')->references('id')->on('habitacions')->onDelete('cascade');
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
        Schema::dropIfExists('reserva_habitacions');
    }
}
