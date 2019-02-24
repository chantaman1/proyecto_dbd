<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservaAsiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
      Schema::create('reserva_asiento', function (Blueprint $table) {
        $table->integer('cant_ninos');
        $table->integer('cant_adultos');
        $table->unsignedInteger('reserva_id');
        $table->unsignedInteger('asiento_id');
        $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('asiento_id')->references('id')->on('asientos')->onDelete('cascade');
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
       Schema::drop('reserva_asiento');
     }
}
