<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('paquetes', function (Blueprint $table) {
         $table->increments('id');
         $table->string('pais_destino', 35);
         $table->string('ciudad_destino', 100);
         $table->integer('precio');
         $table->float('descuento');
         $table->boolean('disponibilidad');
         $table->boolean('posee_vehiculo');
         $table->boolean('posee_hotel');
         $table->boolean('posee_seguro');
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
       Schema::dropIfExists('paquetes');
    }
}
