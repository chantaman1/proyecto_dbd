<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HabitacionPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('habitacion_paquete', function (Blueprint $table) {
        $table->integer('dias');
        $table->integer('noches');
        $table->unsignedInteger('paquete_id');
        $table->unsignedInteger('habitacion_id');
        $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
        $table->foreign('habitacion_id')->references('id')->on('habitacions')->onDelete('cascade');
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
        Schema::dropIfExists('habitacion_paquete');
    }
}
