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
         $table->integer('total_pagado'); //VER EL TIPO DATO
         $table->string('descripcion_pago');
         $table->date('fecha');
         $table->datetime('hora');
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
