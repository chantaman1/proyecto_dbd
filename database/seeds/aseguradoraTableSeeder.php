<?php

use Illuminate\Database\Seeder;

class aseguradoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aseguradoras')->insert([
          'nombre' => "Mapfre",
          "direccion" => "Isidora Goyenechea #3520",
          "telefono" => "600 700 4000",
          "ciudad" => "Las Condes",
          "pais" => "Chile",
          "direccion_web" => "https://www.mapfre.cl/seguros-cl/",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => "Travel Ace Assistance",
          "direccion" => "San Sebastián #2812",
          "telefono" => "+56 2 2495 6000",
          "ciudad" => "Las Condes",
          "pais" => "Chile",
          "direccion_web" => "https://www.travel-ace.com/cl-la/home.html",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => "Assist 365",
          "direccion" => " 80 S.W. 8 Th Street Suite 2000",
          "telefono" => "+54 11 5218 4207",
          "ciudad" => "Miami",
          "pais" => "United States",
          "direccion_web" => "https://assist-365.com",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => "Auxilia Club Asistencia",
          "direccion" => "Las Urbinas #68",
          "telefono" => "+56 2 2797 6107",
          "ciudad" => "Providencia",
          "pais" => "Chile",
          "direccion_web" => "https://www.auxilia.cl/",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => "Assist Card",
          "direccion" => "Andrés Bello #2299",
          "telefono" => "+56 2 2756 1005",
          "ciudad" => "Providencia",
          "pais" => "Chile",
          "direccion_web" => "https://www.assistcard.com/cl",
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
