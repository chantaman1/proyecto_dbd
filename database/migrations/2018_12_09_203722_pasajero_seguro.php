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
      Schema::create('pasajero_seguro', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('pasajero_id');
        $table->unsignedInteger('seguro_id');
        $table->foreign('pasajero_id')->references('id')->on('pasajeros')->onDelete('cascade');
        $table->foreign('seguro_id')->references('id')->on('seguros')->onDelete('cascade');
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
        Schema::dropIfExists('pasajero_seguro');
    }
}
