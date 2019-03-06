<?php

use Illuminate\Database\Seeder;

class hotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Hotel::class, 60)->create();
      DB::table('hotels')->insert([
          'nombre' => 'Park Inn by Radisson Resort',
          'direccion' => '3011 Maingate Lane',
          'telefono' => '+1 407 396 1400',
          'ciudad' => 'Orlando',
          'pais' => 'United States',
          'calificacion' => 4,
          'webpage' => 'https://www.parkinn.com/orlando',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('hotels')->insert([
          'nombre' => 'Wyndham Garden Lake Buena Vista',
          'direccion' => '1850 B Hotel Plaza Boulevard',
          'telefono' => '+1 407 828 4444',
          'ciudad' => 'Orlando',
          'pais' => 'United States',
          'calificacion' => 5,
          'webpage' => 'http://www.wyndhamlakebuenavista.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);


      DB::table('hotels')->insert([
          'nombre' => 'Courtyard by Marriott',
          'direccion' => '1201 Northwest Le Jeune Road',
          'telefono' => '+1 305 642 8200',
          'ciudad' => 'Miami',
          'pais' => 'United States',
          'calificacion' => 4,
          'webpage' => 'https://www.espanol.marriott.com/',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);


      DB::table('hotels')->insert([
          'nombre' => 'Conrad Miami',
          'direccion' => '1395 Brickell Avenue',
          'telefono' => '+1 305 503 6500',
          'ciudad' => 'Miami',
          'pais' => 'United States',
          'calificacion' => 5,
          'webpage' => 'http://conrad.miamiallhotels.com/es/',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);


      DB::table('hotels')->insert([
          'nombre' => 'Hotel Republic San Diego',
          'direccion' => '421 West B Street',
          'telefono' => '+1 619 398 3100',
          'ciudad' => 'San Diego',
          'pais' => 'United States',
          'calificacion' => 5,
          'webpage' => 'http://hotelrepublicsd.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);


      DB::table('hotels')->insert([
          'nombre' => 'Omni San Diego Hotel',
          'direccion' => '675 L Street',
          'telefono' => '+1 619 231 6664',
          'ciudad' => 'San Diego',
          'pais' => 'United States',
          'calificacion' => 4,
          'webpage' => 'https://www.omnihotels.com/hotels/san-diego',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);


      DB::table('hotels')->insert([
          'nombre' => 'Warwick Seattle',
          'direccion' => '401 Lenora Street',
          'telefono' => '+1 206 443 4300',
          'ciudad' => 'Seattle',
          'pais' => 'United States',
          'calificacion' => 5,
          'webpage' => 'https://warwickhotels.com/seattle/',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);


      DB::table('hotels')->insert([
          'nombre' => 'Belltown Inn',
          'direccion' => '2301 3rd Avenue',
          'telefono' => '+1 206 529 3700',
          'ciudad' => 'Seattle',
          'pais' => 'United States',
          'calificacion' => 4,
          'webpage' => 'https://www.belltown-inn.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);
    }
}
