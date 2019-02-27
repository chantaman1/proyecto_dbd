<?php

use Faker\Generator as Faker;

$factory->define(App\Habitacion::class, function (Faker $faker) {
    $hotel = App\Hotel::inRandomOrder()->first()->id;
    return [
      'numero' => $faker->numberBetween($min = 0, $max = 9000),
      'capacidad' => $faker->numberBetween($min = 1, $max = 15),
      'disponibilidad' => $faker->boolean,
      'tipo_cama' => $faker->randomElement($array = array ('matrimonial','queen size','king size')),
      'categoria' => $faker->randomElement($array = array ('comun','deluxe','premium')),
      'precio' => $faker->numberBetween($min = 5000, $max = 50000000),
      'hotel_id' => $hotel,
      'activo' => true,
    ];
});
