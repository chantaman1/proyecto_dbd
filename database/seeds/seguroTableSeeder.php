<?php

use Illuminate\Database\Seeder;

class seguroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('seguros')->insert([
          'tipo' => "Seguro vida viaje",
          'precio' => 72000,
          'descripcion' => "Vida Viaje es un seguro especialmente diseñado para personas que viajan al extranjero y que desean tener protección médica frente a accidentes o enfermedades. Lo puedes contratar de manera individual o para tu grupo familiar. Plan Europa cumple con los requisitos obligatorios de ingreso a la Comunidad Europea (Tratado de Schengen).",
          'aseguradora_id' => 1,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia medica Value",
          'precio' => 32990,
          'descripcion' => "Seguro de asistencia medica valido por 5 dias, el cual incluye seguro hasta $80.000 USD en caso de accidentes y enfermedad.",
          'aseguradora_id' => 2,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia medica Maximum",
          'precio' => 47990,
          'descripcion' => "Seguro de asistencia medica valido por 5 dias, el cual incluye seguro hasta $300.000 USD en caso de accidentes y enfermedad.",
          'aseguradora_id' => 2,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia al viajero",
          'precio' => 29990,
          'descripcion' => "Si enfermas repentinamente durante tu viaje contarás con asistencia médica las 24 Hs donde te acercamos la red de profesionales y establecimientos sanitarios estés donde estés. Contarás con asistencia Médica en caso de accidente que imposibilite la continuación normal de tu viaje, acercandote a la red de profesionales y establecimientos sanitarios para tu pronta recuperación.",
          'aseguradora_id' => 3,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia en viajes WORLD ECO",
          'precio' => 22990,
          'descripcion' => "Ofrecemos asistencia medica por accidentes y enfermedades hasta $30.000 USD, edad maxima 75 años.",
          'aseguradora_id' => 4,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia en viajes WORLD VIP",
          'precio' => 27990,
          'descripcion' => "Ofrecemos asistencia medica por accidentes y enfermedades hasta $100.000 USD, edad maxima 75 años.",
          'aseguradora_id' => 4,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia medica Classic",
          'precio' => 41520,
          'descripcion' => "Servicio incluye asistencia medica hasta $60.000 USD en accidentes y enfermadades, y $500 USD por odontologia de urgencia.",
          'aseguradora_id' => 5,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia medica Premium",
          'precio' => 45672,
          'descripcion' => "Servicio incluye asistencia medica hasta $150.000 USD en accidentes y enfermadades, y $700 USD por odontologia de urgencia.",
          'aseguradora_id' => 5,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Asistencia medica Privileged",
          'precio' => 53976,
          'descripcion' => "Servicio incluye asistencia medica hasta $250.000 USD en accidentes y enfermadades, y $700 USD por odontologia de urgencia.",
          'aseguradora_id' => 5,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Insurance Standard plan",
          'precio' => 41500,
          'descripcion' => "This basic travel insurance plan includes Trip Cancellation, Trip Interruption, Baggage Delay, Medical and Dental Coverage, plus valuable assistance services. Ideal for domestic and international trips, from cruises to vacation rentals.",
          'aseguradora_id' => 7,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Insurance Preffered plan",
          'precio' => 52500,
          'descripcion' => "Our Preferred plan includes the same coverages and assistance services as the Standard plan, plus specific coverages for Sporting Equipment and Sporting Equipment Delay. Great for ski, golf, hiking trips and more.",
          'aseguradora_id' => 7,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Short-term Membership",
          'precio' => 65000,
          'descripcion' => "The MedjetAssist Short-Term Membership is ideal for individuals (up to age 75), and families, planning a cruise, holiday or spring break getaway. Short-Term Members enjoy all the same MedjetAssist benefits as Annual Members, with travel protection provided 24 hours a day during the selected travel period.",
          'aseguradora_id' => 8,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Liaison travel Elite",
          'precio' => 23590,
          'descripcion' => "Our plan includes $100.000 USD coverage and assistance services up to age 75.",
          'aseguradora_id' => 10,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('seguros')->insert([
          'tipo' => "Atlas Travel Medical Insurance Plan",
          'precio' => 37990,
          'descripcion' => "Many times the primary medical insurance in your home country will not cover you while traveling abroad and often will not provide important services, perhaps essential ones, in the event of an illness or injury. Atlas Travel includes these essentials such as translation assistance while being treated, doctor and hospital referrals, and assistance replacing lost prescriptions.",
          'aseguradora_id' => 13,
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
