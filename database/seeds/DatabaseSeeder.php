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
        $this->call(usersTableSeeder::class);
        $this->call(aerolineaTableSeeder::class);
        $this->call(aeropuertoTableSeeder::class);
        $this->call(vueloTableSeeder::class);
        $this->call(asientoTableSeeder::class);
        $this->call(reservaTableSeeder::class);
        $this->call(metodo_pagoTableSeeder::class);
        $this->call(comprobante_pagoTableSeeder::class);
        $this->call(pasajeroTableSeeder::class);
        $this->call(aseguradoraTableSeeder::class);
        $this->call(seguroTableSeeder::class);
        $this->call(paqueteTableSeeder::class);
        $this->call(hotelTableSeeder::class);
        $this->call(habitacionTableSeeder::class);
        $this->call(compania_alquilerTableSeeder::class);
        $this->call(vehiculoTableSeeder::class);
        $this->call(servicioTableSeeder::class);
        $this->call(aeropuerto_vueloSeeder::class);
        $this->call(habitacion_paqueteSeeder::class);
        $this->call(habitacion_reservaSeeder::class);
        $this->call(metodo_pago_usuarioSeeder::class);
        $this->call(paquete_reservaSeeder::class);
        $this->call(paquete_servicioSeeder::class);
        $this->call(paquete_vehiculoSeeder::class);
        $this->call(pasajero_seguroSeeder::class);
        $this->call(reserva_vehiculoSeeder::class);
    }
}
