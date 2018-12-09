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
      Schema::create('usuario', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('apellido_paterno');
          $table->string('apellido_materno');
          $table->date('fecha_nacimiento');
          $table->string('direccion');
          $table->string('telefono');
          $table->string('correo')->unique();
          $table->string('nacionalidad');
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
        Schema::drop('usuario');
    }
}
