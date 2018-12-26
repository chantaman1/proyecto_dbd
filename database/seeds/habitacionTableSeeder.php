<?php

use Illuminate\Database\Seeder;

class habitacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('habitacions')->insert([
        'numero' => 101,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 28334,
        'hotel_id' => 1,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 504,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 79334,
        'hotel_id' => 4,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 302,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 40978,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 607,
        'capacidad' => 2,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 148320,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 405,
        'capacidad' => 6,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 127624,
        'hotel_id' => 5,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 301,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 48290,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 207,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 41047,
        'hotel_id' => 6,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 809,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 148320,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);
      DB::table('habitacions')->insert([
        'numero' => 205,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 44841,
        'hotel_id' => 1,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 604,
        'capacidad' => 2,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 40357,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 201,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 158668,
        'hotel_id' => 6,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 305,
        'capacidad' => 3,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 56845,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 404,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 117276,
        'hotel_id' => 1,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 706,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'premiumn',
        'precio' => 127624,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);
      DB::table('habitacions')->insert([
        'numero' => 1003,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 63407,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1105,
        'capacidad' => 2,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 40357,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1506,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'deluxe',
        'precio' => 100403,
        'hotel_id' => 6,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1304,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 70487,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 304,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 60398,
        'hotel_id' => 4,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1503,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 120725,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 204,
        'capacidad' => 2,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 40357,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 303,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 60472,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 207,
        'capacidad' => 3,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 40254,
        'hotel_id' => 5,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1106,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 60548,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 408,
        'capacidad' => 6,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 100457,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 507,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 100457,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1203,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'premium',
        'precio' => 141421,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 308,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 50465,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 605,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 46843,
        'hotel_id' => 6,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 406,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 60895,
        'hotel_id' => 4,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1405,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 70845,
        'hotel_id' => 4,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 207,
        'capacidad' => 2,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 46856,
        'hotel_id' => 1,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1104,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 80546,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1403,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 95423,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 104,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 57859,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 306,
        'capacidad' => 3,
        'disponibilidad' => false,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 57834,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1507,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 105548,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 708,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 100030,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 303,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 40562,
        'hotel_id' => 1,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1708,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 126244,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1301,
        'capacidad' => 4,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'premium',
        'precio' => 146940,
        'hotel_id' => 2,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 906,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 67845,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 903,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 40756,
        'hotel_id' => 1,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 805,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 100563,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 406,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 50476,
        'hotel_id' => 3,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1003,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 126735,
        'hotel_id' => 2
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1006,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 76947,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 1204,
        'capacidad' => 3,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'comun',
        'precio' => 84265,
        'hotel_id' => 7,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 904,
        'capacidad' => 2,
        'disponibilidad' => true,
        'tipo_cama' => 'simple',
        'categoria' => 'premium',
        'precio' => 80428,
        'hotel_id' => 8,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 907,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'comun',
        'precio' => 67834,
        'hotel_id' => 6,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 902,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'deluxe',
        'precio' => 141421,
        'hotel_id' => 5,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('habitacions')->insert([
        'numero' => 203,
        'capacidad' => 4,
        'disponibilidad' => false,
        'tipo_cama' => 'doble',
        'categoria' => 'premium',
        'precio' => 120725,
        'hotel_id' => 4,
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

    }
}
