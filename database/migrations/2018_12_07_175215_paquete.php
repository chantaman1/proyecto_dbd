<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('paquete', function (Blueprint $table) {
         $table->increments('id');
         $table->string('pais_destino');
         $table->string('ciudad_destino');
         $table->integer('precio');
         $table->string('descuento'); //VER TIPO DATO
         $table->boolean('disponibilidad');
         $table->string('posee_vehiculo'); //VER TIPO DATO
         $table->string('posee_hotel');
         $table->string('posee_seguro');
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
       Schema::drop('paquete');
    }
}
