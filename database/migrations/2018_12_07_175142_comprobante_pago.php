<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComprobantePago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comprobante_pago', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('total_pagado');
         $table->text('descripcion_pago');
         $table->date('fecha');
         $table->time('hora');
         $table->unsignedInteger('id_metodo_pago');
         $table->unsignedInteger('id_reserva');
         $table->foreign('id_metodo_pago')->references('id')->on('metodo_pago')->onDelete('cascade');
         $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete('cascade');
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
       Schema::drop('comprobante_pago');
    }
}
