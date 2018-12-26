<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usuariosTableSeeder::class);
        $this->call(rolTableSeeder::class);
        $this->call(aerolineaTableSeeder::class);
        $this->call(vueloTableSeeder::class);
        $this->call(compania_alquilerTableSeeder::class);
        $this->call(aseguradoraTableSeeder::class);
        $this->call(seguroTableSeeder::class);
        $this->call(hotelTableSeeder::class);
        $this->call(habitacionTableSeeder::class);
    }
}
