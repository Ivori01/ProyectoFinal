<?php

use Illuminate\Database\Seeder;
use App\SubContenido;
use App\Multimedia;
use Carbon\Carbon;
class MultimediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();
        $subcontenidos=SubContenido::all();
        foreach ($subcontenidos as $sub) {
            $multimedia=Multimedia::create([
       
             'ruta'=>$faker->sentence().'jpg',
             'ext'=>'jpg',
             'subcont'=>$sub->id
            ]);
        }
    }
}
