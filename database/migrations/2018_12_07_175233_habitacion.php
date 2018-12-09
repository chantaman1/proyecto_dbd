<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Habitacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('habitacion', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('numero');
         $table->integer('capacidad');
         $table->boolean('disponibilidad');
         $table->string('tipo_cama');
         $table->string('categoria');
         $table->integer('precio');
         $table->unsignedInteger('id_hotel');
         $table->foreign('id_hotel')->references('id')->on('hotel')->onDelete('cascade');
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
     Schema::drop('habitacion');
    }
}
