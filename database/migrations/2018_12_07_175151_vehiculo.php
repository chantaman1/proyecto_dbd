<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vehiculo', function (Blueprint $table) {
         $table->increments('patente'); //VER TIPO DATO
         $table->string('marca');
         $table->string('modelo');
         $table->integer('año'); //VER TIPO DATO
         $table->integer('precio');
         $table->integer('cantidad_asientos');
         $table->string('tipo_transmision');
         $table->string('descripcion');
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
       Schema::drop('vehiculo');
    }
}
