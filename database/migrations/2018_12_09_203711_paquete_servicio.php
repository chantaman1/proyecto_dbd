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
        $table->unsignedInteger('paquete_id');
        $table->unsignedInteger('servicio_id');
        $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
        $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
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
