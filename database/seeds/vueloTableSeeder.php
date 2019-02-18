<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class vueloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vuelo::class, 100)->create();
        $faker = Faker::create();

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Cancun',
            'pais_destino' => 'México',
            'fecha' => '02/07/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 1,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Cancun',
            'pais_origen' => 'México',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago',
            'pais_destino' => 'Chile',
            'fecha' => '02/07/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 1,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Punta Cana',
            'pais_destino' => 'República Dominicana',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 2,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Punta Cana',
            'pais_origen' => 'República Dominicana',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 2,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Playa del Carmen',
            'pais_destino' => 'México',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 3,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Playa del Carmen',
            'pais_origen' => 'México',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 3,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Camboriú',
            'pais_destino' => 'Brasil',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 4,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Camboriú',
            'pais_origen' => 'Brasil',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 4,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Río de Janeiro',
            'pais_destino' => 'Brasil',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 5,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Río de Janeiro',
            'pais_origen' => 'Brasil',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 5,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Búzios',
            'pais_destino' => 'Brasil',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 6,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Búzios',
            'pais_origen' => 'Brasil',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 6,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Puerto Varas',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 7,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Puerto Varas',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 7,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Pucón',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 8,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Pucón',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 8,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Puerto Natales',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 1,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Puerto Natales',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 1,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Buenos Aires',
            'pais_destino' => 'Argentina',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 2,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Buenos Aires',
            'pais_origen' => 'Argentina',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 2,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Bariloche',
            'pais_destino' => 'Argentina',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 3,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Bariloche',
            'pais_origen' => 'Argentina',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 3,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Mendoza',
            'pais_destino' => 'Argentina',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 4,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Mendoza',
            'pais_origen' => 'Argentina',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 4,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Nueva York',
            'pais_destino' => 'Estados Unidos',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 5,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Nueva York',
            'pais_origen' => 'Estados Unidos',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 5,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Los Ángeles',
            'pais_destino' => 'Estados Unidos',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 6,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Los Ángeles',
            'pais_origen' => 'Estados Unidos',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 6,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'ida',
            'ciudad_origen' => 'Santiago de Chile',
            'pais_origen' => 'Chile',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Miami',
            'pais_destino' => 'Estados Unidos',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 7,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        DB::table('vuelos')->insert([
            'tipo' => 'vuelta',
            'ciudad_origen' => 'Miami',
            'pais_origen' => 'Estados Unidos',
            'codigo' => $faker->ean8,
            'ciudad_destino' => 'Santiago de Chile',
            'pais_destino' => 'Chile',
            'fecha' => '01/25/2019',
            'hora' => '00:00:00',
            'aerolinea_id' => 7,
            'asientos' => 0,
            'created_at' => now(),
            'updated_at' => null,
        ]);

    }
}
