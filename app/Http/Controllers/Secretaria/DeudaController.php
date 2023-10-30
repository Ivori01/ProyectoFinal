<?php
namespace App\Http\Controllers\Secretaria;
 
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\Alumno;
use App\Deuda; 



use App\Repositories\SeccionRepository;

use App\Repositories\GradoRepository;


class DeudaController extends Controller
{   

        protected $seccion;
  
    protected $grado;



    public function __construct(SeccionRepository $seccion,GradoRepository $grado)
    {
        
    
        $this->seccion=$seccion;
 
        $this->grado=$grado;
       
    }






 
    public function alumnoDeudas(Request $request)
    {



        $deudas=Alumno::find($request->alumno)->deudas->where("estado","Pendiente");

         

            $option="<option></option>";
            foreach ($deudas as $deuda) {
           
                 
              
                $option.= '<option value='.$deuda->id.' > '.$deuda->pagoInfo->descripcion.'</option>'; 
            }
            $deudas= ' <select name="deuda" class="select2" id="deuda" data-placeholder="Deuda" >'.$option.'</select>  ';

        return response()->json(['deudas'=>$deudas]);

    }


  



}
