<?php

use Illuminate\Database\Seeder;

class paqueteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('paquetes')->insert([
          'pais_destino' => 'México',
          'ciudad_destino' => 'Cancún',
          'precio' => 649230,
          'descuento' => 33,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/cancun1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'República Dominicana',
          'ciudad_destino' => 'Punta Cana',
          'precio' => 595000,
          'descuento' => 0,
          'cupos' => 47,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/puntacana1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'México',
          'ciudad_destino' => 'Playa del Carmen',
          'precio' => 1014692,
          'descuento' => 0,
          'cupos' => 37,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/playadelcarmen1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Camboriú',
          'precio' => 530610,
          'descuento' => 0,
          'cupos' => 43,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/camboriu1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Río de Janeiro',
          'precio' => 492075,
          'descuento' => 15,
          'cupos' => 17,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/riodejaneiro1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Búzios',
          'precio' => 530875,
          'descuento' => 0,
          'cupos' => 33,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/buzios1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Puerto Varas',
          'precio' => 125700,
          'descuento' => 0,
          'cupos' => 28,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/puertovaras1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Pucón',
          'precio' => 167600,
          'descuento' => 0,
          'cupos' => 14,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/pucon1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Puerto Natales',
          'precio' => 205700,
          'descuento' => 15,
          'cupos' => 27,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/puertonatales1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Buenos Aires',
          'precio' => 259615,
          'descuento' => 33,
          'cupos' => 23,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/buenosaires1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Bariloche',
          'precio' => 280165,
          'descuento' => 0,
          'cupos' => 45,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/bariloche1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Mendoza',
          'precio' => 180700,
          'descuento' => 25,
          'cupos' => 15,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/mendoza1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Nueva York',
          'precio' => 885600,
          'descuento' => 0,
          'cupos' => 47,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/nuevayork1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Los Ángeles',
          'precio' => 879106,
          'descuento' => 0,
          'cupos' => 34,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/losangeles1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Miami',
          'precio' => 879106,
          'descuento' => 15,
          'cupos' => 18,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'image' => 'images/miami1.jpg',
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
