<?php

use Illuminate\Database\Seeder;

class usuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Usuario::class, 20)->create();

        DB::table('usuarios')->insert([
          'nombre' => 'Edgar',
          'apellido_paterno' => 'Blau',
          'apellido_materno' => 'Rojas',
          'fecha_nacimiento' => '1995-05-19',
          'password' => bcrypt('chantaman1'),
          'direccion' => 'Avenida Las Acacias #02852',
          'telefono' => '+56 9 7524 2480',
          'correo' => 'edgar.blau@usach.cl',
          'nacionalidad' => 'Chile',
          'pasaporte' => '516841313513',
        ]);
    }
}
