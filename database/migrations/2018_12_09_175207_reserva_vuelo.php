<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservaVuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
<<<<<<< HEAD
     public function up()
     {
       Schema::create('reserva_vuelo', function (Blueprint $table) {
         $table->unsignedInteger('id_reserva');
         $table->foreign('id_reserva')->references('id')->on('reservas');
         $table->unsignedInteger('id_vuelo');
         $table->foreign('id_vuelo')->references('id')->on('vuelos');
         $table->integer('cant_adultos',1);
         $table->integer('cant_niños',1);
         $table->integer('cant_infantes',1);
         $table->timestamps();
       });
     }
=======
    public function up()
    {
      Schema::create('reserva_vuelos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('cant_ninos');
        $table->integer('cant_adultos');
        $table->integer('cant_infantes');
        $table->unsignedInteger('id_reserva');
        $table->unsignedInteger('id_vuelo');
        $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
        $table->foreign('id_vuelo')->references('id')->on('vuelos')->onDelete('cascade');
        $table->timestamps();
      });
    }
>>>>>>> f7c73bc605a787080360436e676a4c17a4565cd8

     /**
     * Reverse the migrations.
     *
     * @return void
     */
<<<<<<< HEAD
     public function down()
     {
     Schema::drop('reserva_vuelo');
     }
=======
    public function down()
    {
        Schema::dropIfExists('reserva_vuelos');
    }
>>>>>>> f7c73bc605a787080360436e676a4c17a4565cd8
}
