<?php

use Illuminate\Database\Seeder;

class vehiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Vehiculo::class, 250)->create();
      DB::table('vehiculos')->insert([
          'patente' => 'CGHJ56',
          'marca' => 'Suzuki',
          'modelo' => 'Swift',
          'año' => 2017,
          'precio' => 20823,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 1,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'CDTS34',
          'marca' => 'Hyundai',
          'modelo' => 'Grand I-20',
          'año' => 2016,
          'precio' => 20823,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 1,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'DRGT57',
          'marca' => 'Toyota',
          'modelo' => 'All New Yaris Sport',
          'año' => 2018,
          'precio' => 29237,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 2,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'BSTP43',
          'marca' => 'Hyundai',
          'modelo' => 'Accent',
          'año' => 2017,
          'precio' => 29237,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 2,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'CRPR22',
          'marca' => 'Peugeot',
          'modelo' => '208',
          'año' => 2017,
          'precio' => 29237,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 3,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'DRTW28',
          'marca' => 'Peugeot',
          'modelo' => '208 Active',
          'año' => 2018,
          'precio' => 30699,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 3,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'BPTR17',
          'marca' => 'Hyundai',
          'modelo' => 'Elantra',
          'año' => 2018,
          'precio' => 38996,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'automatico',
          'descripcion' => '',
          'compania_alquiler_id' => 3,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('vehiculos')->insert([
          'patente' => 'CVGF25',
          'marca' => 'Chevrolet',
          'modelo' => 'Prisma',
          'año' => 2018,
          'precio' => 36881,
          'cantidad_asientos' => 5,
          'tipo_transmision' => 'mecanico',
          'descripcion' => '',
          'compania_alquiler_id' => 3,
          'disponibilidad' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
