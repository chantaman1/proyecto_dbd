<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 63);//nombre más largo 41 caracteres
          $table->string('apellido_paterno', 40);//apellido más largo 39 char
          $table->string('apellido_materno', 40);//apellido más largo 39 char
          $table->string('password', 127);
          $table->string('fecha_nacimiento', 30);
          $table->string('direccion', 100);
          $table->string('telefono', 30);
          $table->string('correo')->unique();
          $table->string('nacionalidad', 63);//Pais más largo 31 char (republica democratica del congo)
          $table->string('pasaporte')->unique();
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
        Schema::dropIfExists('usuarios');
    }
}
