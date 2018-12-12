<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MetodoPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
      Schema::create('metodo_pago', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2018_12_09_205841_metodo_pago.php
        $table->increments('id');
        $table->string('nombre');
        $table->string('tipo');
        $table->timestamps();
=======
=======
      Schema::create('metodo_pagos', function (Blueprint $table) {
>>>>>>> ed40cca73efe4d3e9aa1dcc807214c0a2fb61666
         $table->increments('id');
         $table->string('tipo', 30);
         $table->string('nombre', 40);
         $table->timestamps();
>>>>>>> f7c73bc605a787080360436e676a4c17a4565cd8:database/migrations/2018_12_07_175048_metodo_pago.php
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
<<<<<<< HEAD:database/migrations/2018_12_09_205841_metodo_pago.php
        Schema::drop('metodo_pago');
=======
        Schema::dropIfExists('metodo_pago');
>>>>>>> f7c73bc605a787080360436e676a4c17a4565cd8:database/migrations/2018_12_07_175048_metodo_pago.php
=======
        Schema::dropIfExists('metodo_pagos');
>>>>>>> ed40cca73efe4d3e9aa1dcc807214c0a2fb61666
    }
}
