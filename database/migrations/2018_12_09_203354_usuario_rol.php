<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuario_rol', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_usuario');
        $table->unsignedInteger('id_rol');
        $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
        $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade');
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
        Schema::dropIfExists('usuario_rol');
    }
}
