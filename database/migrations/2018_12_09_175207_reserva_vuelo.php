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
        $table->integer('cant_ninos');
        $table->integer('cant_adultos');
        $table->integer('cant_infantes');
        $table->unsignedInteger('reserva_id');
        $table->unsignedInteger('vuelo_id');
        $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('vuelo_id')->references('id')->on('vuelos')->onDelete('cascade');
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
       Schema::drop('reserva_vuelo');
     }
}
