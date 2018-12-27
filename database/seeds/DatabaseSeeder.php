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
        $this->call(transaccionSeeder::class);
        $this->call(rolTableSeeder::class);
        $this->call(usuariosTableSeeder::class);
        $this->call(reservaTableSeeder::class);
        $this->call(metodo_pagoTableSeeder::class);
        $this->call(comprobante_pagoTableSeeder::class);
        $this->call(aerolineaTableSeeder::class);
        $this->call(aeropuertoTableSeeder::class);
        $this->call(vueloTableSeeder::class);
        $this->call(asientoTableSeeder::class);
        $this->call(pasajeroTableSeeder::class);
        $this->call(compania_alquilerTableSeeder::class);
        $this->call(vehiculoTableSeeder::class);
        $this->call(aseguradoraTableSeeder::class);
        $this->call(seguroTableSeeder::class);
        $this->call(hotelTableSeeder::class);
        $this->call(habitacionTableSeeder::class);
        $this->call(paqueteTableSeeder::class);
    }
}
