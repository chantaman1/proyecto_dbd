<?php

use Faker\Generator as Faker;

$factory->define(App\Vuelo::class, function (Faker $faker) {
    return [
      'tipo' => 'ida',
      'ciudad_origen' => $faker->lastName,
      'pais_origen' => $faker->lastName,
      'codigo' => $faker->date,
      'ciudad_destino' => bcrypt($faker->password),
      'pais_destino' => $faker->address,
      'fecha' => $faker->phoneNumber,
      'hora' => $faker->unique()->safeEmail,
      'aerolinea_id' => $faker->numberBetween($min = 1, $max = 8),
    ];
});
