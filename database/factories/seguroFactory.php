<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
      'tipo' => $faker->randomElement(['Estandar Internacional','Plata','Oro','Platino','Diamante']),
      'precio' => $faker->numberBetween(10000, 300000),
      'descripcion' => $faker->text,
    ];
});
