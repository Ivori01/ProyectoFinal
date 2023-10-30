<?php

use App\Nivel;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     

        $nivel=new Nivel();
        $nivel->nombre='Primaria';
        $nivel->descripcion='Nivel de primaria';
        $nivel->color='#ABBAC3';
        $nivel->save();

        $nivel=new Nivel();
        $nivel->nombre='Secundaria';
        $nivel->descripcion='Nivel de secundaria';
        $nivel->color='#ABBAC3';
        $nivel->save();
        
    }
}
