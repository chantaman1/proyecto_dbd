<?php

use Faker\Generator as Faker;

$factory->define(App\Pasajero::class, function (Faker $faker) {
  $asientos = App\Asiento::all()->count();
  $actual = $faker->numberBetween($min = 1, $max = $asientos);
  $asiento = App\Asiento::where([['disponibilidad', '=', true], ['id', '=', $actual]]);
  while($asiento == false){
    $actual = $faker->numberBetween($min = 1, $max = $asientos);
    $asiento = App\Asiento::where([['disponibilidad', '=', true], ['id', '=', $actual]]);
  }
    return [
      'nombre' => $faker->firstName,
      'apellido_paterno' => $faker->lastName,
      'apellido_materno' => $faker->lastName,
      'fecha_nacimiento' => $faker->date,
      'telefono' => $faker->phoneNumber,
      'correo' => $faker->unique()->safeEmail,
      'nacionalidad' => $faker->country,
      'pasaporte' => $faker->ean13,
      'asiento_id' => $actual,
    ];
});
