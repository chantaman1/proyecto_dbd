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
          $table->string('contrasena');
          $table->date('fecha_nacimiento');
          $table->string('correo')->unique();
          $table->string('sexo');
          $table->string('pais');
          $table->string('numero_pasaporte')->unique();
          $table->date('fecha_exp_pasaporte');
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
