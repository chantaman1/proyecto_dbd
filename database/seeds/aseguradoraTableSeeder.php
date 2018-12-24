<?php

use Illuminate\Database\Seeder;

class aseguradoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aseguradoras')->insert([
          'nombre' => 'Mapfre',
          'direccion' => 'Isidora Goyenechea #3520',
          'telefono' => '600 700 4000',
          'ciudad' => 'Las Condes',
          'pais' => 'Chile',
          'webpage' => 'https://www.mapfre.cl/seguros-cl/',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Travel Ace Assistance',
          'direccion' => 'San Sebastián #2812',
          'telefono' => '+56 2 2495 6000',
          'ciudad' => 'Las Condes',
          'pais' => 'Chile',
          'webpage' => 'https://www.travel-ace.com/cl-la/home.html',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Assist 365',
          'direccion' => '80 S.W. 8 Th Street Suite 2000',
          'telefono' => '+54 11 5218 4207',
          'ciudad' => 'Miami',
          'pais' => 'United States',
          'webpage' => 'https://assist-365.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Auxilia Club Asistencia',
          'direccion' => 'Las Urbinas #68',
          'telefono' => '+56 2 2797 6107',
          'ciudad' => 'Providencia',
          'pais' => 'Chile',
          'webpage' => 'https://www.auxilia.cl/',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Assist Card',
          'direccion' => 'Andrés Bello #2299',
          'telefono' => '+56 2 2756 1005',
          'ciudad' => 'Providencia',
          'pais' => 'Chile',
          'webpage' => 'https://www.assistcard.com/cl',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Arch Roam Right',
          'direccion' => '11350 McCormick Road',
          'telefono' => '+54 1 800 699 3845',
          'ciudad' => 'Cockeysville',
          'pais' => 'United States',
          'webpage' => 'https://www.roamright.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Generali Global Assistance',
          'direccion' => '4181 Ruffin Rd #150',
          'telefono' => '+54 800 541 3522',
          'ciudad' => 'San Diego',
          'pais' => 'United States',
          'webpage' => 'https://www.generalitravelinsurance.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Medjet',
          'direccion' => '3075 Healthy Way',
          'telefono' => '+54 800 527 7478',
          'ciudad' => 'Birmingham',
          'pais' => 'United States',
          'webpage' => 'https://https://medjetassist.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Allianz Global Assistance',
          'direccion' => 'P.O. Box 71533',
          'telefono' => '+ 54 1 866 724 5082',
          'ciudad' => 'Richmond',
          'pais' => 'United States',
          'webpage' => 'https://www.allianztravelinsurance.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Seven Corners, Inc.',
          'direccion' => '303 Congressional Boulevard',
          'telefono' => '+54 1 800 335 0611',
          'ciudad' => 'Carmel',
          'pais' => 'United States',
          'webpage' => 'https://www.sevencorners.com/es/',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'AardvarkInsure.com Corporation',
          'direccion' => '1200 South Pine Island Road',
          'telefono' => '+54 650 397 6590',
          'ciudad' => 'Plantation',
          'pais' => 'United States',
          'webpage' => 'https://www.aardvarkcompare.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Travelex Insurance Services',
          'direccion' => '9140 West Dodge Road',
          'telefono' => '+54 1 800 228 9792 ',
          'ciudad' => 'Omaha',
          'pais' => 'United States',
          'webpage' => 'https://www.travelexinsurance.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);

      DB::table('aseguradoras')->insert([
          'nombre' => 'Atlas Travel Insurance',
          'direccion' => '251 North Illinois Street',
          'telefono' => '+54 800 605 2282',
          'ciudad' => 'Indianapolis',
          'pais' => 'United States',
          'webpage' => 'https://www.hccmis.com',
          'activo' => true,
          'created_at' => now(),
          'updated_at' => null,
      ]);
      
    }
}
