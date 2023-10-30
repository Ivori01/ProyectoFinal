<?php

use App\Alumno;
use App\Matricula;
use App\Seccion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnos=Alumno::all();
        $secciones=Seccion::all();

        foreach($alumnos as $alumno){
            $seccion=$secciones->random();
            $matricula=Matricula::create([
                'id_alumno'=>$alumno->id,
                'id_seccion'=>$seccion->id,
                'fecha'=>Carbon::now()
            ]);
            $seccion->capacidad-1;
            $seccion->save();
        }
    }
}
