<?php

use Illuminate\Database\Seeder;
use App\PlanAcademico;
use App\PlanAcademicoTrimestre;
use App\Trimestre;

class PlanGradoTrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planes=PlanAcademico::all();

        foreach ($planes as $plan) {
            foreach ($plan->grados as $plan_grado) {
                $trimestres=Trimestre::all();

                foreach($trimestres as $trimestre){
                    $plan_grado_trimestre=new PlanAcademicoTrimestre();
                    $plan_grado_trimestre->trimestre=$trimestre->id;
                    $plan_grado_trimestre->plan_grado=$plan_grado->id;
                    $plan_grado_trimestre->save();
                }
               
            }
        }
    }
}
