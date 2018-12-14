<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    $tipo_array = array("ida","vuelta");
    return [
      'tipo' => $faker->randomElement(['ida','vuelta']),
      'ciudad_origen' => $faker->city,
      'pais_origen' => $faker->country,
      'codigo' => $faker->ean8,
      'ciudad_destino' => $faker->city,
      'pais_destino' => $faker->country,
      'fecha' => $faker->dateTimeBetween('now', '+364days') ,
      'hora' => $faker->time($format = 'H:i:s'),
      'aerolinea_id' => $faker->numberBetween(1, 8),
    ];
});