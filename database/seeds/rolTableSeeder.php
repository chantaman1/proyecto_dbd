<?php

use Illuminate\Database\Seeder;

class rolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('rols')->insert([
          'tipo' => "administrador",
          'created_at' => now(),
          'updated_at' => now(),
      ]);

      DB::table('rols')->insert([
          'tipo' => "usuario",
          'created_at' => now(),
          'updated_at' => now(),
      ]);

      DB::table('rols')->insert([
          'tipo' => "premium",
          'created_at' => now(),
          'updated_at' => now(),
      ]);
    }
}
