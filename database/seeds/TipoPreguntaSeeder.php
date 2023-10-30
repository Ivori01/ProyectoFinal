<?php

use Illuminate\Database\Seeder;
use App\TipoPregunta;
class TipoPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo=new TipoPregunta();
        $tipo->nombre='Opción múltiple';
        $tipo->save();

        $tipo=new TipoPregunta();
        $tipo->nombre='Verdadero/Falso';
        $tipo->save();

        $tipo=new TipoPregunta();
        $tipo->nombre='Pregunta abierta';
        $tipo->save();
    }
}
