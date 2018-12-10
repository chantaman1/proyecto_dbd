<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seguro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('seguro', function (Blueprint $table) {
         $table->increments('id');
         $table->string('tipo', 30);
         $table->integer('precio');
         $table->text('descripcion');
         $table->unsignedInteger('id_aseguradora');
         $table->foreign('id_aseguradora')->references('id')->on('aseguradora')->onDelete('cascade');
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
       Schema::dropIfExists('seguro');
    }
}
