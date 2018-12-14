<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
      'nombre' => $faker->firstName,
      'apellido_paterno' => $faker->lastName,
      'apellido_materno' => $faker->lastName,
      'fecha_nacimiento' => $faker->date,
      'telefono' => $faker->phoneNumber,
      'correo' => $faker->unique()->safeEmail,
      'nacionalidad' => $faker->country,
      'pasaporte' => $faker->ean13,
    ];
});