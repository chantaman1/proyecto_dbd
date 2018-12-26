<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('servicios', function (Blueprint $table) {
        $table->increments('id');
        $table->string('tipo', 40);
        $table->integer('precio');
        $table->string('descripcion', 255);
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
      Schema::dropIfExists('servicios');
    }
}
