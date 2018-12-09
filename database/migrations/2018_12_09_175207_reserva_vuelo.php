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
         $table->unsignedInteger('id_reserva');
         $table->foreign('id_reserva')->references('id')->on('reservas');
         $table->unsignedInteger('id_vuelo');
         $table->foreign('id_vuelo')->references('id')->on('vuelos');
         $table->integer('cant_adultos',1);
         $table->integer('cant_niños',1);
         $table->integer('cant_infantes',1);
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
