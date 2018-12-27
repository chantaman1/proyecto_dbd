<?php

use Illuminate\Database\Seeder;

class aeropuertoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aeropuertos')->insert([
          'nombre' => "Charles de Gaulle",
          'ciudad' => "Francia",
          'direccion' => "95700 Roissy-en-France",
          'pais' => "Paris",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Hong Kong Airport",
          'ciudad' => "Hong Kong",
          'direccion' => "Airport Authority Hong Kong, 1 SkyPlaza Road",
          'pais' => "China",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Heathrow Airport",
          'ciudad' => "London",
          'direccion' => "Greater London TW6",
          'pais' => "Reino Unido",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Haneda Airport",
          'ciudad' => "Tokyo",
          'direccion' => "Tokyo 144-0041",
          'pais' => "Japon",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Los Angeles Airport",
          'ciudad' => "Los Angeles",
          'direccion' => "1 World Way",
          'pais' => "Estados Unidos",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Miami International Airport",
          'ciudad' => "Miami",
          'direccion' => "2100 NW 42nd Ave",
          'pais' => "United States",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Internacional Ezeiza",
          'ciudad' => "Buenos Aires",
          'direccion' => "AU Tte. Gral. Pablo Riccheri Km 33,5",
          'pais' => "Argentina",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Internacional Comodoro Arturo Merino Benitez",
          'ciudad' => "Santiago",
          'direccion' => "Aviador David Fuentes",
          'pais' => "Chile",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Singapore Changi Airport",
          'ciudad' => "Singapur",
          'direccion' => "Airport Blvd",
          'pais' => "Singapur",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Incheon International Airport",
          'ciudad' => "Incheon",
          'direccion' => "272 Gonghang-ro",
          'pais' => "Corea del Sur",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Doha Hamad International Airport",
          'ciudad' => "Doha",
          'direccion' => "Doha",
          'pais' => "Catar",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Munich Airpoirt",
          'ciudad' => "Munich",
          'direccion' => "Nordallee 25, 85356 München",
          'pais' => "Alemania",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Central Japan International Airport",
          'ciudad' => "Tokoname",
          'direccion' => "1 Chome-1 Centrair",
          'pais' => "Japon",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Zurich Airport",
          'ciudad' => "Kloten",
          'direccion' => "8058 Zürich-Flughafen",
          'pais' => "Suiza",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Frankfurt Airport",
          'ciudad' => "Frankfurt",
          'direccion' => "60547 Frankfurt",
          'pais' => "Alemania",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Narita International Airport",
          'ciudad' => "Narita",
          'direccion' => "1-1 Furugome, Narita",
          'pais' => "Japon",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Kansai International Airport",
          'ciudad' => "Osaka",
          'direccion' => "1 Senshukukokita",
          'pais' => "Japon",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Taiwan Taoyuan International Airport",
          'ciudad' => "Taoyuan",
          'direccion' => "No. 9, Hangzhan S Rd",
          'pais' => "Taiwan",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Helsinki-Vantaa Airport",
          'ciudad' => "Vantaa",
          'direccion' => "01531 Vantaa",
          'pais' => "Finlandia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Vienna International Airport",
          'ciudad' => "Schwechat",
          'direccion' => "Wien-Flughafen, 1300",
          'pais' => "Austria",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Copenhagen Airport",
          'ciudad' => "Copenhague",
          'direccion' => "Lufthavnsboulevarden 6, 2770",
          'pais' => "Dinamarca",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Sydney Airport",
          'ciudad' => "Sydney",
          'direccion' => "Nueva Gales del Sur 2020",
          'pais' => "Australia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Cape Town International Airport",
          'ciudad' => "Cabo",
          'direccion' => "Matroosfontein 7490",
          'pais' => "Sudafrica",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Brisbane Airport",
          'ciudad' => "",
          'direccion' => "",
          'pais' => "",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Dubai International Airport",
          'ciudad' => "Dubai",
          'direccion' => " Dubai - Emiratos Arabes Unidos",
          'pais' => "Emirates Arabes",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Auckland International Airport",
          'ciudad' => "Auckland",
          'direccion' => "Auckland 2022",
          'pais' => "Nueva Zelanda",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Hamburg Airport",
          'ciudad' => "Hamburgo",
          'direccion' => "Flughafenstr. 1-3, 22335",
          'pais' => "Alemania",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Melbourne Airport",
          'ciudad' => "Melbourne",
          'direccion' => "Departure Dr, Melbourne Airport VIC 3045",
          'pais' => "Australia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "London City Airport",
          'ciudad' => "London",
          'direccion' => "Hartmann Rd, London E16 2PX",
          'pais' => "Reino Unido",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Denver International Airport",
          'ciudad' => "Denver",
          'direccion' => "8500 Peña Blvd",
          'pais' => "Estados Unidos",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Dusseldorf Airport",
          'ciudad' => "Dusseldorf",
          'direccion' => "Flughafenstrabe 105, 40474",
          'pais' => "Alemania",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Cologne Airport",
          'ciudad' => "Bonn",
          'direccion' => "Kennedystrabe, 51147",
          'pais' => "Alemania",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Beijing Capital International Airport",
          'ciudad' => "Beijing",
          'direccion' => "Shunyi",
          'pais' => "China",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Athens International Airport",
          'ciudad' => "Atenas",
          'direccion' => "Attiki Odos, Spata Artemida 190 04",
          'pais' => "Grecia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Gimpo International Airport",
          'ciudad' => "Seul",
          'direccion' => "12 Haneul-gil, Gangseo-gu",
          'pais' => "Corea del Sur",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Toronto Pearson International Airport",
          'ciudad' => "Toronto",
          'direccion' => "Ontario",
          'pais' => "Canada",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Madrid-Barajas Airport",
          'ciudad' => "Madrid",
          'direccion' => "Av de la Hispanidad, s/n, 28042",
          'pais' => "España",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Kuala Lumpur International Airport",
          'ciudad' => "Selangor",
          'direccion' => "64000 Sepang",
          'pais' => "Malasia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Bogota El Dorado International Airport",
          'ciudad' => "Bogota",
          'direccion' => "Calle 26 #103-9, Fontibon",
          'pais' => "Colombia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Quito International Airport",
          'ciudad' => "Quito",
          'direccion' => "Quito 170907",
          'pais' => "Ecuador",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Houston George Bush Intercontinental Airport",
          'ciudad' => "Houston",
          'direccion' => "2800 N Terminal Rd",
          'pais' => "Estados Unidos",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Jorge Chavez International Airport",
          'ciudad' => "Callao",
          'direccion' => "Av. Elmer Faucett s/n, Callao 07031",
          'pais' => "Peru",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "San Francisco International Airport",
          'ciudad' => "San Francisco",
          'direccion' => "California 94128",
          'pais' => "Estados Unidos",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Christchurch International Airport",
          'ciudad' => "Christchurch",
          'direccion' => "30 Durey Rd",
          'pais' => "Nueva Zelanda",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Abu Dhabi International Airport",
          'ciudad' => "Abu Dabi",
          'direccion' => "Abu Dabi - Emiratos Arabes Unidos",
          'pais' => "Emiratos Arabes",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "London Gatwick Airport",
          'ciudad' => "London",
          'direccion' => "Horley, Gatwick RH6 0NP",
          'pais' => "Reino Unido",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Gold Coast Airport",
          'ciudad' => "Queensland",
          'direccion' => "Eastern Ave, Bilinga QLD 4225",
          'pais' => "Australia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Lisbon Portela Airport",
          'ciudad' => "Lisboa",
          'direccion' => "Alameda das Comunidades Portuguesas, 1700-111",
          'pais' => "Portugal",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Stockholm Arlanda Airport",
          'ciudad' => "Estocolmo",
          'direccion' => "190 45 Stockholm-Arlanda",
          'pais' => "Suecia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Perth Airport",
          'ciudad' => "Guildford",
          'direccion' => "Occidental 6105",
          'pais' => "Australia",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Chengdu Shuangliu International Airport",
          'ciudad' => "Sichuan",
          'direccion' => "Shuangliu, Chengdu",
          'pais' => "China",
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aeropuertos')->insert([
          'nombre' => "Oslo Airport",
          'ciudad' => "Oslo",
          'direccion' => "Edvard Munchs veg, 2061",
          'pais' => "Noruega",
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
