<?php

use App\Descuento;
use Illuminate\Database\Seeder;

class DescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 11; $i++) {
            $descuento=Descuento::create([
            'descripcion'=>'Descuento N° '.$i,
            'cantidad'=>$faker->numberBetween(10, 50)
           ]);
        }
    }
}
