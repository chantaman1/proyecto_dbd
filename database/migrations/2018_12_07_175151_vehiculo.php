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
         $table->string('patente', 15); //VER TIPO DATO, es string
         $table->string('marca', 40);
         $table->string('modelo', 40);
         $table->integer('año'); //VER TIPO DATO
         $table->integer('precio');
         $table->integer('cantidad_asientos');
         $table->enum('tipo_transmision',['manual','automatico','CVT','automatico doble embrague']);
         $table->text('descripcion');
         $table->unsignedInteger('id_compania_alquiler');
         $table->foreign('id_compania_alquiler')->references('id')->on('compania_alquiler')->onDelete('cascade');
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
       Schema::dropIfExists('vehiculo');
    }
}
