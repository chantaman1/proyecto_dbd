<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaqueteHabitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquete_habitacions', function (Blueprint $table) {
        $table->increments('id');
        $table->date('fecha_inicio');
        $table->date('fecha_termino');
        $table->unsignedInteger('id_paquete');
        $table->unsignedInteger('id_habitacion');
        $table->foreign('id_paquete')->references('id')->on('paquetes')->onDelete('cascade');
        $table->foreign('id_habitacion')->references('id')->on('habitacions')->onDelete('cascade');
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
        Schema::dropIfExists('paquete_habitacions');
    }
}
