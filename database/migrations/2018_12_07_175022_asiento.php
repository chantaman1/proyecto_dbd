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
          $table->string('codigo', 10);//cambie numero de asiento por codigo
          $table->string('tipo', 30);
          $table->boolean('disponibilidad');
          $table->integer('precio');
          $table->unsignedInteger('id_vuelo');
          $table->foreign('id_vuelo')->references('id')->on('vuelo')->onDelete('cascade');
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
        Schema::dropIfExists('asiento');
    }
}
