<?php

namespace App\Http\Controllers\Secretaria;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Alumno;
use App\Docente;
use App\Apoderado;
use App\Seccion;
use App\Curso;
use App\Deuda;
use App\Cobro;
use App\User;
use App\AnioAcademico;

use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function Data()
    {
    	 

    }

    public function index()
    {

        $anios=AnioAcademico::with(['secciones.datosGrado','datosPlanAcademico'])->where('estado','Activo')->get();

 $secciones =0;
foreach ($anios as $anio) {

$secciones +=$anio->secciones->count();
       
       }


    	$data= collect([
    'alumnos' => Alumno::All()->count(),
    'alumnos.activo' => Alumno::where('estadoacademico','Estudiando')->count(),
    'alumnos.egresado' => Alumno::where('estadoacademico','Egresado')->count(),
    'alumnos.retirado' => Alumno::where('estadoacademico','Retirado')->count(),
    'alumnos.suspendido' => Alumno::where('estadoacademico','Suspendido')->count(),


    'caja'=>Cobro::with(['deudaInfo'])->orderBy('fecha','desc')->limit(5)->get(),

    


    
]);
    	


    	  return view('secretaria.index',['data'=>$data]);
    }

    


}
