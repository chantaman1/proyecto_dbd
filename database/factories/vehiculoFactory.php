<?php

use Faker\Generator as Faker;

$factory->define(App\Vehiculo::class, function (Faker $faker) {
    $compania_id = App\Compania_alquiler::inRandomOrder()->first()->id;
    return [
      'patente' => $faker->ean8,
      'marca' => $faker->company,
      'modelo' => $faker->colorName,
      'año' => $faker->year($min = '-20 years', $max = 'now'),
      'precio' => $faker->numberBetween($min = 10000, $max = 200000),
      'cantidad_asientos' => $faker->numberBetween($min = 4, $max = 6),
      'tipo_transmision' => $faker->randomElement($array = array ('mecanico','automatico')),
      'descripcion' => $faker->text($maxNbChars = 100),
      'compania_alquiler_id' => $compania_id,
      'disponibilidad' => true,
    ];
});
