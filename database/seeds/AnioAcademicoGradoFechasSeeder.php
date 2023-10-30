<?php

use App\AnioAcademico;
use App\TrimestreFechas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnioAcademicoGradoFechasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anio=AnioAcademico::find(1);
        $niveles=$anio->niveles;
        foreach($niveles as $anio_nivel){
            $grados=$anio_nivel->planAcademico->grados;
            foreach($grados as $plan_grado){
                $trimestres=$plan_grado->trimestres;
                foreach($trimestres as $plang_trim){
                    $trimestre_fechas=new TrimestreFechas;
                    $trimestre_fechas->anio_nivel=$anio_nivel->id;
                    $trimestre_fechas->plangrad_trim=$plang_trim->id;
                    $trimestre_fechas->fechainicio=Carbon::now();
                    $trimestre_fechas->fechafin=Carbon::now()->addMonths(6);
                    $trimestre_fechas->save();

                }
              
            }
           
        }
    }
}
