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
      Schema::create('comprobante_pagos', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('total_pagado');
         $table->text('descripcion_pago');
         $table->date('fecha');
         $table->time('hora');
         $table->unsignedInteger('metodo_pago_id');
         $table->unsignedInteger('reserva_id');
         $table->foreign('metodo_pago_id')->references('id')->on('metodo_pagos')->onDelete('cascade');
         $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
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
       Schema::dropIfExists('comprobante_pagos');
    }
}
