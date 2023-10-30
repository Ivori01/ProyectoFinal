<?php

use App\Contenido;
use App\SeccionDocenteCurso;
use App\SubContenido;
use App\Trimestre;
use Illuminate\Database\Seeder;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos=SeccionDocenteCurso::all();
        $trimestres=Trimestre::all();
        foreach ($cursos as $curso) {
            $orden=1;
            foreach ($trimestres as $trimestre) {
             $contenido=Contenido::create([
                 'nombre'=>$trimestre->nombre.' '. $trimestre->periodo,
                 'orden'=>$orden,
                 'curso'=>$curso->id
             ]);
            for ($i=1; $i <7; $i++) { 
              $sub_cont=SubContenido::create([
                  'nombre'=>'Semana '.$i,
                  'contenido'=>$contenido->id,
                  'orden'=>$i,
              ]);

            }
             $orden++;

            }
        }
    }
}
