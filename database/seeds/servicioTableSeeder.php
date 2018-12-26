<?php

use Illuminate\Database\Seeder;

class servicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('servicios')->insert([
          'tipo' => '',
          'precio' => 100,
          'descripcion' => '',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => '',
          'precio' => 100,
          'descripcion' => '',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => '',
          'precio' => 100,
          'descripcion' => '',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => '',
          'precio' => 100,
          'descripcion' => '',
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
