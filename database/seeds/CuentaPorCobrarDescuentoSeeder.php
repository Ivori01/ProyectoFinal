<?php

use App\CuentaPorCobrar;
use App\CuentaPorCobrarDescuento;
use App\Descuento;
use Illuminate\Database\Seeder;

class CuentaPorCobrarDescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deudas=CuentaPorCobrar::all();
        $descuentos=Descuento::all();

        foreach($deudas->random(100) as $deuda){

            $deuda_descuento=CuentaPorCobrarDescuento::create([
                'id_cta_cobrar'=>$deuda->id,
                'descuento'=>$descuentos->random()->id
            ]);
        }
    }
}
