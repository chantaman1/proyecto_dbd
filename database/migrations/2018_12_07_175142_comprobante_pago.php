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
         $table->dngettext('descripcion_pago');
         $table->date('fecha');
         $table->datetime('hora');
         $table->foreign('id_metodo_pago')->references('id')->on('metodo_pago');
         $table->foreign('id_reserva')->references('id')->on('reserva');
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
