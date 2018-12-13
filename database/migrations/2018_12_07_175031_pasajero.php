<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pasajero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pasajeros', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nombre', 45);//nombre más largo 41 caracteres
         $table->string('apellido_paterno', 40);//apellido más largo 39 char
         $table->string('apellido_materno', 40);//apellido más largo 39 char
         $table->date('fecha_nacimiento');
         $table->string('telefono',15);
         $table->string('nacionalidad', 35);//Pais más largo 31 char (republica democratica del congo)
         $table->string('pasaporte')->unique();
         $table->unsignedInteger('asiento_id');
         $table->foreign('asiento_id')->references('id')->on('asientos')->onDelete('cascade');
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
       Schema::dropIfExists('pasajeros');
    }
}
