<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rol_usuario', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_usuario');
        $table->unsignedInteger('id_rol');
        $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        $table->foreign('id_rol')->references('id')->on('rols')->onDelete('cascade');
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
        Schema::dropIfExists('rol_usuario');
    }
}
