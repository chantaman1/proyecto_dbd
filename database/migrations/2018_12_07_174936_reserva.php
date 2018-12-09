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
      Schema::create('reserva', function (Blueprint $table) {
          $table->increments('id');
          $table->date('fecha');
          $table->datetime('hora'); 
          $table->integer('total_a_pagar');
          //$table->boolean('estado_pago') tipo dato?
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
        Schema::drop('reserva');
    }
}
