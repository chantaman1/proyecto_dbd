<?php

use Illuminate\Database\Seeder;

class transaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('transaccions')->insert([
          'descripcion' => 'Creado usuario con correo: ',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('transaccions')->insert([
          'descripcion' => 'Actualizada informacion de usuario con correo: ',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('transaccions')->insert([
          'descripcion' => 'Se ha eliminado un usuario de la base de datos.',
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
