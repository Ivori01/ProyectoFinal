<?php

use Illuminate\Database\Seeder;
use App\Parametro;
class ParametrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parametro=new Parametro();
        $parametro->codigo   = '000001';
        $parametro->valor1   ='Presente';
        $parametro->valor2   = 'ESTADO ASISTENCIA';
        $parametro->valor3   ='';
        $parametro->estado   = '1';
        $parametro->save();

        $parametro=new Parametro();
        $parametro->codigo   = '000002';
        $parametro->valor1   ='Ausente';
        $parametro->valor2   = 'ESTADO ASISTENCIA';
        $parametro->valor3   ='';
        $parametro->estado   = '1';
        $parametro->save();

        $parametro=new Parametro();
        $parametro->codigo   = '000003';
        $parametro->valor1   ='Tarde';
        $parametro->valor2   = 'ESTADO ASISTENCIA';
        $parametro->valor3   ='';
        $parametro->estado   = '1';
        $parametro->save();
    }
}
