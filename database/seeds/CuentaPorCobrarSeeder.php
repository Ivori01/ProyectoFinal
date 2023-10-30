<?php

use App\Alumno;
use App\Concepto;
use App\CuentaPorCobrar;
use Illuminate\Database\Seeder;

class CuentaPorCobrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conceptos=Concepto::all();
        $alumnos=Alumno::all();

        foreach ($alumnos as $alumno) {
            foreach ($conceptos->random(5) as $concepto) {
                $cuenta=CuentaPorCobrar::create([
                    'id_concepto'=>$concepto->id,
                    'alumno'=>$alumno->id,
                    'estado'=>'Pendiente'
            ]);
            }
        }
    }
}
