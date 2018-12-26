<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reservas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('totalAPagar');
          $table->string('estado_pago');
          $table->unsignedInteger('usuario_id');
          $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
}
