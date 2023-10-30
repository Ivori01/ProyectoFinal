<?php

namespace App\Http\Controllers\Director;

use App\Alumno;
use App\AnioAcademico;

use App\Cobro;
use App\Curso;
use App\CuentaPorCobrar;
use App\Docente;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{

    public function Data()
    {

    }

    public function index()
    {

        $anio = AnioAcademico::where('estado', 'Activo')->first();

        $secciones  = 0;
        $matriculas = 0;
        if ($anio) {
                foreach ($anio->niveles as $nivel) {

            $secciones += $nivel->secciones->count();

            foreach ($nivel->secciones as $seccion) {
 
                $matriculas += $seccion->alumnos->count();
            }

        }

        }
    
        $data = collect([
            'alumnos'            => Alumno::All()->count(),
            'alumnos.activo'     => Alumno::where('estadoacademico', 'Estudiando')->count(),
            'alumnos.egresado'   => Alumno::where('estadoacademico', 'Egresado')->count(),
            'alumnos.retirado'   => Alumno::where('estadoacademico', 'Retirado')->count(),
            'alumnos.suspendido' => Alumno::where('estadoacademico', 'Suspendido')->count(),

            'docentes'           => Docente::All()->count(),
            'docentes.activo'    => Docente::where('estado', 'Activo')->count(),

            

            'secciones'          => $secciones,

            'cursos'             => Curso::All()->count(),

            'deuda'              => CuentaPorCobrar::All()->count(),
            'deuda.pagado'       => CuentaPorCobrar::where('estado', 'Pagado')->count(),
            'deuda.pendiente'    => CuentaPorCobrar::where('estado', 'Pendiente')->count(),

            'caja'               => Cobro::with(['deudaInfo'])->orderBy('fecha', 'desc')->limit(5)->get(),

            'user'               => User::with(['persona'])->orderBy('created_at', 'desc')->limit(9)->get(),
            'matriculas'         => $matriculas,

        ]);

        return view('director.index', ['data' => $data]);
    }

}
