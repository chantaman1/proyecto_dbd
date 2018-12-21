<?php

use Illuminate\Database\Seeder;

class aeropuertoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aeropuertos')->insert([
          'nombre' => "Charles de Gaulle",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Hong Kong Airport",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Heathrow Airport",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Haneda Airport",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Los Angeles Airport",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Miami International Airport",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Internacional Ezeiza",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Internacional Comodoro Arturo Merino Benitez",
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
