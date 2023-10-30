<?php

use App\AnioAcademico;
use App\AnioAcademicoNivel;
use App\Nivel;
use App\PlanAcademico;
use Illuminate\Database\Seeder;

class AnioAcademicoNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anio=AnioAcademico::find(1);
        $niveles=Nivel::all();

        foreach($niveles as $nivel){
            $anio_nivel=new AnioAcademicoNivel;
            $anio_nivel->anio=$anio->id;
            $anio_nivel->nivel=$nivel->id;
            $anio_nivel->plan=PlanAcademico::where('nivel',$nivel->id)->first()->id;
            $anio_nivel->save();
        }
    }
}
