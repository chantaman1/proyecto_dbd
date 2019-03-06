<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    $data = App\Paquete::inRandomOrder()->first();
    return [
      'nombre' => $faker->company,
      'direccion' => $faker->address,
      'telefono' => $faker->phoneNumber,
      'ciudad' => $data->ciudad_destino,
      'pais' => $data->pais_destino,
      'calificacion' => $faker->numberBetween($min = 1, $max = 5),
      'webpage' => $faker->domainName,
      'activo' => true,
    ];
});
