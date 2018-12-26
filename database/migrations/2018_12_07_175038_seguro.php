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
      Schema::create('seguros', function (Blueprint $table) {
         $table->increments('id');
         $table->string('tipo', 63);
         $table->integer('precio');
         $table->text('descripcion');
         $table->unsignedInteger('aseguradora_id');
         $table->foreign('aseguradora_id')->references('id')->on('aseguradoras')->onDelete('cascade');
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
       Schema::dropIfExists('seguros');
    }
}
