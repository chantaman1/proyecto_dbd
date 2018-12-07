<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
      Schema::create('rol', function (Blueprint $table) {
          $table->increments('id');
          $table->string('tipo');
          $table->timestamps();
      });
=======
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
        });
>>>>>>> d7da0bcae0377be40cafb9ef246011f182411382
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rol');
    }
}
