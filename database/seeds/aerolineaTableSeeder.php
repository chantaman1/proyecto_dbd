<?php

use Illuminate\Database\Seeder;

class aerolineaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aerolineas')->insert([
          'nombre' => "Qatar Airways",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "Emirates",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "LATAM",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "United Airlines",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "Aeromexico",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "Air Berlin",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "Air China",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aerolineas')->insert([
          'nombre' => "Sky Airlines",
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
