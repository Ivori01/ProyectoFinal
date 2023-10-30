<?php

use App\Concepto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConceptoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
      for ($i=0; $i < 20; $i++) { 
          $concepto=Concepto::create([
              'descripcion'=>'Pago N° ' .$i,
              'importe'=>$faker->numberBetween(100,500),
              'anio'=>Carbon::now()->format('Y'),
              'fecha_vencimiento'=>Carbon::now()->addMonths(6),
              'mora_dia'=>1
          ]);
          # code...
      }
    }
}
