<?php

use App\AnioAcademico;
use App\Docente;
use App\DocenteNivel;
use App\Seccion;
use App\SeccionDocenteCurso;
use Illuminate\Database\Seeder;

class SeccionDocenteCursoSeeder extends Seeder
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

        foreach ($niveles as $nivel) {
            $plan=$nivel->planAcademico;
            $grados=$plan->grados;
            $docentes=DocenteNivel::where('nivel',$nivel->nivel)->get();
            foreach ($nivel->secciones as $seccion) {
                $grado=$grados->where('grado', $seccion->grado)->first();
                $cursos=$grado->cursos;
                foreach ($cursos as $curso) {
                    $seccion_docente_curso=SeccionDocenteCurso::create([
                        'curso'=>$curso->id,
                        'docente'=>$docentes->random()->docente,
                        'seccion'=>$seccion->id
                    ]);
                }
            }
        }
        $secciones=Seccion::all();

        foreach ($secciones as $seccion) {
        }
    }
}
