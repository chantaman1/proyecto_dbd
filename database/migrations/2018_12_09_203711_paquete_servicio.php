<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaqueteServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquete_servicio', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_paquete');
        $table->unsignedInteger('id_servicio');
        $table->foreign('id_paquete')->references('id')->on('paquete')->onDelete('cascade');
        $table->foreign('id_servicio')->references('id')->on('servicio')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_servicio');
    }
}
