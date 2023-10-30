<?php

use App\PlanAcademico;
use Illuminate\Database\Seeder;
use App\Grado;
use App\PlanAcademicoGrado;

class PlanGradoSeeder extends Seeder
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
            $grados=Grado::where('nivel', $plan->nivel)->get();
            foreach ($grados as $grado) {
                $plan_grado=new PlanAcademicoGrado;
                $plan_grado->plan=$plan->id;
                $plan_grado->grado=$grado->id;
                $plan_grado->tipo_cal='Numerica';
                $plan_grado->modo_criterio='same';
                $plan_grado->save();
            }
        }
    }
}
