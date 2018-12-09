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
        $table->increments('id');
         $table->string('patente'); //VER TIPO DATO, es string
         $table->string('marca');
         $table->string('modelo');
         $table->integer('año'); //VER TIPO DATO
         $table->integer('precio');
         $table->integer('cantidad_asientos');
         $table->enum('tipo_transmision',['manual','automatico','CVT','automatico doble embrague']);
         $table->text('descripcion');
         $table->foreign('id_compania_alquiler')->references('id')->on('compania_alquiler');
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
