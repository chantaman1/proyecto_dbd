<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aeropuerto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('aeropuerto', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre', 60);
          $table->string('ciudad', 100);
          $table->string('direccion', 100);
          $table->string('pais',35);//Pais más largo 31 char (republica democratica del congo)
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
        Schema::dropIfExists('aeropuerto');
    }
}
