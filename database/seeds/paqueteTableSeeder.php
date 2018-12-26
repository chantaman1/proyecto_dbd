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
          'pais_destino' => 'Mexico',
          'ciudad_destino' => 'Cancun',
          'precio' => 649230,
          'descuento' => 33,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Republica Dominicana',
          'ciudad_destino' => 'Punta Cana',
          'precio' => 595000,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Mexico',
          'ciudad_destino' => 'Riviera Maya',
          'precio' => 947892,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Mexico',
          'ciudad_destino' => 'Playa del Carmen',
          'precio' => 1014692,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Camboriu',
          'precio' => 530610,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Rio de Janeiro',
          'precio' => 492075,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Florianopolis',
          'precio' => 923910,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Buzios',
          'precio' => 530875,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Salvador de Bahia',
          'precio' => 471965,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Orlando',
          'precio' => 780215,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Miami',
          'precio' => 1017225,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Cuba',
          'ciudad_destino' => 'Varadero',
          'precio' => 825263,
          'descuento' => 14,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Puerto Varas',
          'precio' => 125700,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Pucon',
          'precio' => 167600,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Puerto Natales',
          'precio' => 205700,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Peru',
          'ciudad_destino' => 'Lima',
          'precio' => 293865,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Peru',
          'ciudad_destino' => 'Cusco',
          'precio' => 334965,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Peru',
          'ciudad_destino' => 'Mancora',
          'precio' => 444565,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Uruguay',
          'ciudad_destino' => 'Punta del Este',
          'precio' => 307565,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Uruguay',
          'ciudad_destino' => 'Punta del Este',
          'precio' => 911295,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Colombia',
          'ciudad_destino' => 'Cartagena de Indias',
          'precio' => 643215,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Colombia',
          'ciudad_destino' => 'Isla San Andres',
          'precio' => 930915,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Colombia',
          'ciudad_destino' => 'Santa Marta',
          'precio' => 937765,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Colombia',
          'ciudad_destino' => 'Isla San Andres',
          'precio' => 1006265,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Iquique',
          'precio' => 144800,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'San Pedro de Atacama',
          'precio' => 183900,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Costa Rica',
          'ciudad_destino' => 'San Jose',
          'precio' => 1346025,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => true,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Buenos Aires',
          'precio' => 259615,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Bariloche',
          'precio' => 280165,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Ecuador',
          'ciudad_destino' => 'Islas Galapagos',
          'precio' => 704865,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Isla de Pascua',
          'precio' => 443200,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Puerto Natales',
          'precio' => 231567,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Puerto Varas',
          'precio' => 100778,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Concepcion',
          'precio' => 118172,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Arica',
          'precio' => 175667,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Chiloe',
          'precio' => 204598,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'La Serena',
          'precio' => 137017,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Huilo Huilo',
          'precio' => 236060,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Coyhaique',
          'precio' => 156552,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Chile',
          'ciudad_destino' => 'Valdivia',
          'precio' => 164084,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Colombia',
          'ciudad_destino' => 'Cartagena de Indias',
          'precio' => 475320,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Nueva York',
          'precio' => 885600,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Estados Unidos',
          'ciudad_destino' => 'Los Angeles',
          'precio' => 879106,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Sao Paulo',
          'precio' => 238786,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Buzios',
          'precio' => 393720,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Brasil',
          'ciudad_destino' => 'Pipa',
          'precio' => 616975,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Peru',
          'ciudad_destino' => 'Cusco',
          'precio' => 248200,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Peru',
          'ciudad_destino' => 'Lima',
          'precio' => 189720,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Peru',
          'ciudad_destino' => 'Punta Sal',
          'precio' => 597375,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Mendoza',
          'precio' => 150075,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Cordoba',
          'precio' => 188090,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Argentina',
          'ciudad_destino' => 'Iguazu',
          'precio' => 288811,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Mexico',
          'ciudad_destino' => 'Ciudad de Mexico',
          'precio' => 698349,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Uruguay',
          'ciudad_destino' => 'Montevideo',
          'precio' => 190400,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'España',
          'ciudad_destino' => 'Madrid',
          'precio' => 917125,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'España',
          'ciudad_destino' => 'Barcelona',
          'precio' => 1049191,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Francia',
          'ciudad_destino' => 'Paris',
          'precio' => 1798232,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('paquetes')->insert([
          'pais_destino' => 'Ecuador',
          'ciudad_destino' => 'Quito',
          'precio' => 448224,
          'descuento' => 0,
          'cupos' => 50,
          'disponibilidad' => true,
          'posee_vehiculo' => false,
          'posee_hotel' => true,
          'posee_seguro' => false,
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
