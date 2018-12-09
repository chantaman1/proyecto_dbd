<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioMetodoPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuario_metodo_pago', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_usuario');
        $table->unsignedInteger('id_metodo_pago');
        $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
        $table->foreign('id_metodo_pago')->references('id')->on('metodo_pago')->onDelete('cascade');
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
        Schema::dropIfExists('usuario_metodo_pago');
    }
}
