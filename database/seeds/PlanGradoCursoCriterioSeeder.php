<?php

use App\CriterioEvaluacion;
use App\CursoCriterio;
use Illuminate\Database\Seeder;
use App\PlanAcademico;

class PlanGradoCursoCriterioSeeder extends Seeder
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
            $grados_plan=$plan->grados;
            foreach ($grados_plan as $plan_grado) {
                $cursos=$plan_grado->cursos;
                $trimestres=$plan_grado->trimestres;
                foreach ($cursos as $plan_grado_curso) {
                    $criterios=CriterioEvaluacion::where('curso', $plan_grado_curso->curso)->get();

                    foreach ($trimestres as $trimestre) {

                        foreach($criterios as $criterio){
                            $plan_grado_curso_criterio=new CursoCriterio();
                            $plan_grado_curso_criterio->curso=$plan_grado_curso->id;
                            $plan_grado_curso_criterio->criterio=$criterio->id;
                            $plan_grado_curso_criterio->trimestre=$trimestre->id;
                            $plan_grado_curso_criterio->save();
                        }
                        
                    }
                }
            }
        }
    }
}
