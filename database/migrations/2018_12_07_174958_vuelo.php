<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vuelo', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('codigo');
          $table->string('tipo');
          $table->string('origen');
          $table->string('destino');
          $table->date('fecha');
          $table->datetime('hora');
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
        Schema::drop('vuelo');
    }
}
