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
      Schema::create('vehiculos', function (Blueprint $table) {
        $table->increments('id');
         $table->string('patente', 15); //VER TIPO DATO, es string
         $table->string('marca', 40);
         $table->string('modelo', 40);
         $table->integer('año'); //VER TIPO DATO
         $table->integer('precio');
         $table->integer('cantidad_asientos');
         $table->string('tipo_transmision',20);
         $table->text('descripcion');
         $table->boolean('disponibilidad');
         $table->unsignedInteger('compania_alquiler_id');
         $table->foreign('compania_alquiler_id')->references('id')->on('compania_alquilers')->onDelete('cascade');
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
       Schema::dropIfExists('vehiculos');
    }
}
