<?php

use Illuminate\Database\Seeder;

class servicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('servicios')->insert([
          'tipo' => 'Acuatico',
          'precio' => 18000,
          'descripcion' => 'Deportes acuaticos no motorizados',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => 'Infantil',
          'precio' => 12000,
          'descripcion' => 'Miniclub para niños con actividades diarias.',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => 'Senderismo',
          'precio' => 15000,
          'descripcion' => 'Actividad deportiva para recorrer a pie rutas, senderos o montañas.',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => 'Ciclismo',
          'precio' => 17000,
          'descripcion' => 'Actividad deportiva para recorrer en bicicleta rutas, senderos o montañas.',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => 'Alimentacion',
          'precio' => 10000,
          'descripcion' => 'Proporcionar alimentos o bebidas para ser consumidas dentro del establecimiento.',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('servicios')->insert([
          'tipo' => 'Guia',
          'precio' => 15000,
          'descripcion' => 'Prestar servicios de guianza turistica profesional, para interpretar patrimonio cultural y natural del lugar.',
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
