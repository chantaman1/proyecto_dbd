<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Auditoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('auditoria', function (Blueprint $table) {
          $table->increments('id');
          $table->string('tipo_transaccion');
          $table->date('fecha');
          $table->datetime('hora');
          $table->unsignedInteger('id_usuario');
          $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
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
        Schema::dropIfExists('auditoria');
    }
}
