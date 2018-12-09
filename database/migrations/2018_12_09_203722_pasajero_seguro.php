<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PasajeroSeguro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquete_seguro', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_pasajero');
        $table->unsignedInteger('id_seguro');
        $table->foreign('id_pasajero')->references('id')->on('pasajero')->onDelete('cascade');
        $table->foreign('id_seguro')->references('id')->on('seguro')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_seguro');
    }
}
