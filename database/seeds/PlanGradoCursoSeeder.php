<?php

use App\Curso;
use App\PlanAcademico;
use App\PlanAcademicoGradoCurso;
use Illuminate\Database\Seeder;

class PlanGradoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planes=PlanAcademico::all();
        foreach($planes as $plan){
            $grados_plan=$plan->grados;
            foreach($grados_plan as $plan_grado){
                $cursos=Curso::where('nivel',$plan->nivel)->get();
                 foreach($cursos as $curso){
                     $plan_grado_curso=new PlanAcademicoGradoCurso;
                     $plan_grado_curso->curso=$curso->id;
                     $plan_grado_curso->plan_grado=$plan_grado->id;
                     $plan_grado_curso->save();
                 }

            }
        }
    }
}
