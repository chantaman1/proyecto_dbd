<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();

        DB::table('users')->insert([
          'nombre' => 'Edgar',
          'apellido_paterno' => 'Blau',
          'apellido_materno' => 'Rojas',
          'fecha_nacimiento' => '1995-05-19',
          'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
          'direccion' => 'Avenida Las Acacias #02852',
          'telefono' => '+56 9 7524 2480',
          'email' => 'edgar.blau@usach.cl',
          'nacionalidad' => 'Chile',
          'pasaporte' => '516841313513',
          'created_at' => now(),
          'updated_at' => now(),
          'email_verified_at' => now(),
          'email_token' => '4sf6s5fg6fgs8s46fs68fs468f468fsdf684',
          'verified' => true,
          'remember_token' => str_random(10),
        ]);
    }
}
