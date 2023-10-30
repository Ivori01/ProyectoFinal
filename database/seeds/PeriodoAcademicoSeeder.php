<?php

use App\Trimestre;
use Illuminate\Database\Seeder;

class PeriodoAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodo=new Trimestre();
        $periodo->numero=1;
        $periodo->nombre='Primer';
        $periodo->periodo='Trimestre';
        $periodo->save();

        $periodo=new Trimestre();
        $periodo->numero=2;
        $periodo->nombre='Segundo';
        $periodo->periodo='Trimestre';
        $periodo->save();

        $periodo=new Trimestre();
        $periodo->numero=3;
        $periodo->nombre='Tercer';
        $periodo->periodo='Trimestre';
        $periodo->save();
    }
}
