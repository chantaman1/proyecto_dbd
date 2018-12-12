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
          $table->date('fecha');
          $table->time('hora');
          $table->integer('total_a_pagar');
          $table->enum('estado_pago',['pendiente','aprobado','en proceso','rechazado','cancelado','devuelto','contracargo']);
          $table->unsignedInteger('id_usuario');
          $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
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
