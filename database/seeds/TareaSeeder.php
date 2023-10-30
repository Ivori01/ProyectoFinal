<?php

use Illuminate\Database\Seeder;
use App\SubContenido;
use App\Tarea;
use Carbon\Carbon;

class TareaSeeder extends Seeder
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
            $tarea=Tarea::create([
             'nombre'=>$faker->sentence(),
             'indicaciones'=>'Is there a way I can get a random date between two dates in Carbon? For example, I am trying to get a random date between now and 55 mins ago.',
             'fecha_ap'=>Carbon::now(),
             'fecha_ven'=>Carbon::now()->addMonths(2),
             'sub_cont'=>$sub->id

            ]);
        }
    }
}
