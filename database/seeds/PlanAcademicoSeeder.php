<?php

use App\Nivel;
use App\PlanAcademico;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PlanAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $niveles=Nivel::all();
       foreach($niveles as $nivel){
           $plan=new PlanAcademico();
           $plan->nombre='Plan academico '.Carbon::now()->format('Y').' '.$nivel->nombre;
           $plan->nivel=$nivel->id;
           $plan->estado='Activo';
           $plan->save();
       }
    }
}
