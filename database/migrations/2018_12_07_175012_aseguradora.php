<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aseguradora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('aseguradoras', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nombre', 60);
         $table->string('direccion', 100);
         $table->string('telefono', 31);
         $table->string('ciudad', 100);
         $table->string('pais', 35);
         $table->string('webpage', 256);
         $table->boolean('activo');
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
       Schema::dropIfExists('aseguradoras');
    }
}
