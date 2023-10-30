<?php

use App\Grado;
use App\Nivel;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $niveles=Nivel::all();
        $nombres = array("Primero", "Segundo", "Tercero", "Cuarto", "Quinto", "Sexto", "2 Años", "3 Años", "4 Años", "5 Años");

        foreach($niveles as $nivel){
            for ($i=1; $i < 6; $i++) { 
              $grado=new Grado();
              $grado->nombre=$nombres[$i-1];
              $grado->numero=$i;
              $grado->nivel=$nivel->id;
              $grado->estado='Activo';
              $grado->save();
            }
        }
       
    }
}
