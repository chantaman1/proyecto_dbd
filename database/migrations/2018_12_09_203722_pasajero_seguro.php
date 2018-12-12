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
      Schema::create('paquete_seguros', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('id_pasajero');
        $table->unsignedInteger('id_seguro');
        $table->foreign('id_pasajero')->references('id')->on('pasajeros')->onDelete('cascade');
        $table->foreign('id_seguro')->references('id')->on('seguros')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_seguros');
    }
}
