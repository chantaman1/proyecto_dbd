<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaqueteVehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquete_vehiculo', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_paquete');
        $table->unsignedInteger('id_vehiculo');
        $table->foreign('id_paquete')->references('id')->on('paquete')->onDelete('cascade');
        $table->foreign('id_vehiculo')->references('id')->on('vehiculo')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_vehiculo');
    }
}
