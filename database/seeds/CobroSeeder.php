<?php

use App\Cobro;
use App\CobroDetalle;
use Illuminate\Database\Seeder;
use App\CuentaPorCobrar;
use App\Secretaria;
use Carbon\Carbon;

class CobroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deudas=CuentaPorCobrar::all();
      
        $secretaria=Secretaria::all()->first();

        foreach($deudas->random(100) as $deuda){
            $importe=$deuda->conceptoPagoInfo->importe;
            $descuentos=$deuda->descuentos;
            foreach($descuentos as $descuento){
                $importe-=$descuento->cantidad;
            }
         $cobro=Cobro::create([
             'fecha'=>Carbon::now(),
             'cajero'=>$secretaria->persona->nrodocumento,
            // 'cliente'=>$deuda->alumnoInfo->apoderado,
             'importe'=>$importe

         ]);

         $cobro_detalle=CobroDetalle::create([
             'id_cobro'=>$cobro->id,
             'id_deuda'=>$deuda->id
         ]);
        
        }
    }
}
