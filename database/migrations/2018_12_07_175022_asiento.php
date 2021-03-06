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
      Schema::create('asientos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('codigo', 10);//cambie numero de asiento por codigo
          $table->string('tipo', 30);
          $table->boolean('disponibilidad');
          $table->integer('precio');
          $table->boolean('comprado');
          $table->unsignedInteger('vuelo_id');
          $table->foreign('vuelo_id')->references('id')->on('vuelos')->onDelete('cascade');
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
        Schema::dropIfExists('asientos');
    }
}
