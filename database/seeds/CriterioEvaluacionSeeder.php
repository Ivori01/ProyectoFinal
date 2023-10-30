<?php

use App\CriterioEvaluacion;
use App\Curso;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Nivel;
class CriterioEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles=Curso::all();
        foreach ($niveles as $nivel) {
            for ($i=0; $i <3 ; $i++) { 
                $faker=Factory::create();
                $criterio=new CriterioEvaluacion();
                $criterio->nombre=$faker->sentence(5);
                $criterio->descripcion=$faker->sentence( 10);
                $criterio->estado='Activo';
                $criterio->curso=$nivel->id;
                $criterio->save();
            }
             
            
          

        }
    }
}
