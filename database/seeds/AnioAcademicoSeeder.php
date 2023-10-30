<?php

use App\AnioAcademico;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnioAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anio=new AnioAcademico;
        $anio->descripcion= 'Año academico '.Carbon::now()->format('Y');
        $anio->estado='Activo';
        $anio->anio=Carbon::now()->format('Y');
        $anio->save();
    }
}
