<?php

namespace App\Http\Controllers\Docente;

use App\AnioAcademico;
use App\Docente;
use App\Http\Controllers\Controller;
use App\SeccionDocenteCurso;
use App\User;

class HomeController extends Controller
{

    public function Data()
    {

    }

    public function index()
    {

        $anio=AnioAcademico::where('estado','Activo')->first();
        $cursos=[];
        if($anio){
            foreach ($anio->niveles as $nivel) {

                // $secciones += $nivel->secciones->count();
     
                 foreach ($nivel->secciones as $seccion) {
     
                     foreach ($seccion->cursos->where('docente',auth()->user()->persona->id) as $curso) {
                       $cursos[]=$curso;
                     }
                 }
     
             }
        
        }



       

        return view('docente.index', ['cursos' => $cursos]);
    }

}
