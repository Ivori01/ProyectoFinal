<?php

use App\AnioAcademico;
use App\Grado;
use App\Seccion;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $anio=AnioAcademico::find(1);
       $anios_nivel=$anio->niveles;

       foreach($anios_nivel as $anio_nivel){

        $grados=Grado::where('nivel',$anio_nivel->datosNivel->id)->where('estado','Activo')->get() ;

        foreach($grados  as $grado){
            $seccion=Seccion::create([
                'grado'=>$grado->id,
                'letra'=>'A',
                'anio_nivel'=>$anio_nivel->id,
                'capacidad'=>40

            ]);

        }

       }


    }
}
