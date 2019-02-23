<?php

use Faker\Generator as Faker;

$factory->define(App\Asiento::class, function (Faker $faker) {
  $count = App\Vuelo::all()->count();
  $tipo_array = array("Economico", "Economico Premium", "Business Premium");
  $tipo = $tipo_array[array_rand($tipo_array)];
  if($tipo == "Economico"){
    return [
        'codigo' => $faker->unique()->numberBetween($min = 1, $max = 538),
        'tipo' => $tipo_array[array_rand($tipo_array)],
        'disponibilidad' => true,
        'precio' => $faker->numberBetween($min = 100000, $max = 200000),
        'vuelo_id' => $faker->numberBetween($min = 1, $max = $count),
        'comprado' => false,
    ];
  }
  else if($tipo == "Economico Premium"){
    return [
        'codigo' => $faker->unique()->numberBetween($min = 1, $max = 538),
        'tipo' => $tipo_array[array_rand($tipo_array)],
        'disponibilidad' => true,
        'precio' => $faker->numberBetween($min = 200000,$max = 300000),
        'vuelo_id' => $faker->numberBetween($min = 1, $max = $count),
        'comprado' => false,
    ];
  }
  else if($tipo == "Business Premium"){
    return [
        'codigo' => $faker->unique()->numberBetween($min = 1, $max = 538),
        'tipo' => $tipo_array[array_rand($tipo_array)],
        'disponibilidad' => true,
        'precio' => $faker->numberBetween($min = 350000, $max = 500000),
        'vuelo_id' => $faker->numberBetween($min = 1, $max = $count),
        'comprado' => false,
    ];
  }

});
