<?php

use Illuminate\Database\Seeder;

class compania_alquilerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('compania_alquilers')->insert([
        'nombre' => 'Hertz',
        'direccion' => 'Avenida Americo Vespucio #1601',
        'telefono' => '+56 2 2360 8617',
        'ciudad' => 'Quilicura',
        'pais' => 'Chile',
        'direccion_web' => 'https://www.hertz.cl',
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('compania_alquilers')->insert([
        'nombre' => 'Europcar',
        'direccion' => 'Avenida Americo Vespucio #1373',
        'telefono' => '+56 2 2598 3263',
        'ciudad' => 'Pudahuel',
        'pais' => 'Chile',
        'direccion_web' => 'https://www.europcar.cl',
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);

      DB::table('compania_alquilers')->insert([
        'nombre' => 'Avis Rent a Car',
        'direccion' => 'Luz #2934',
        'telefono' => '+56 2 2795 3916',
        'ciudad' => 'Las Condes',
        'pais' => 'Chile',
        'direccion_web' => 'https://www.avis.cl',
        'activo' => true,
        'created_at' => now(),
        'updated_at' => null,
      ]);
    }
}
