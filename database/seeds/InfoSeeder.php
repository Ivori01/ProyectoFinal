<?php

use App\Info;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info=new Info();
        $info->direccion='Calle Real 1045 El Tambo - Hyo';
        $info->telefono='(064) 253396';
        $info->mail='cloued@cloued.com';
        $info->nombre='Clouded';
        $info->logo='logo.png';
        $info->postal='10002';
        $info->save();
    }
}
