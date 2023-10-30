<?php

namespace App\Http\Controllers\Alumno;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\CuentaPorCobrar;

class HomeController extends Controller
{
    
    public function Data()
    {
    	 

    }

    public function index()
    {


    	$data= collect([

    

    'deudas'=>CuentaPorCobrar::with(['conceptoPagoInfo'])->where(['estado'=>'Pendiente','alumno'=>auth()->user()->persona->id])->take(5)->get(),
   

    
]);
    	


    	  return view('alumno.index',['data'=>$data]);
    }

    


}
