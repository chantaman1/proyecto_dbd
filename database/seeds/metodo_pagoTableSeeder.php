<?php

use Illuminate\Database\Seeder;

class metodo_pagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('metodo_pagos')->insert([
          'tipo' => "Tarjeta Debito"
          'nombre' => "WebPay",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('metodo_pagos')->insert([
          'tipo' => "Tarjeta Credito"
          'nombre' => "WebPay",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('metodo_pagos')->insert([
          'tipo' => "Tarjeta Credito"
          'nombre' => "Mastercard",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('metodo_pagos')->insert([
          'tipo' => "Tarjeta Credito"
          'nombre' => "Visa",
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
