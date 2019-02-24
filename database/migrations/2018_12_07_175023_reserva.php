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
          $table->string('estado_pago',30);
          $table->integer('reserva');
          $table->integer('cant_ninos');
          $table->integer('cant_adultos');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('asiento_id');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
}
