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
      Schema::create('habitacions', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('numero');
         $table->integer('capacidad');
         $table->boolean('disponibilidad');
         $table->string('tipo_cama', 30);
         $table->string('categoria', 30);
         $table->integer('precio');
         $table->boolean('activo');
         $table->unsignedInteger('hotel_id');
         $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
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
     Schema::dropIfExists('habitacions');
    }
}
