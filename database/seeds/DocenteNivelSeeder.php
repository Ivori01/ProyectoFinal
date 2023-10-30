<?php

use App\Docente;
use App\DocenteNivel;
use App\Nivel;
use Illuminate\Database\Seeder;

class DocenteNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docente_nivel=new DocenteNivel();
        $niveles=Nivel::all();
        $docentes=Docente::all();

        foreach ($docentes as $docente){
            $docente_nivel=DocenteNivel::create(['docente'=>$docente->id,'nivel'=>$niveles->random()->id]);
        }
        
    }
}
