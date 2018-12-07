<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('asiento', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('numero');
          $table->string('tipo');
          $table->integer('precio');
          $table->integer('descuento');
          $table->boolean('disponibilidad');
          $table->foreign('id_vuelo')->references('id')->on('vuelo');
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
        Schema::drop('asiento');
    }
}
