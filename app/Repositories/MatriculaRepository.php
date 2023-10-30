<?php
namespace App\Repositories;

use App\Matricula;
use App\Seccion;
use Illuminate\Http\Request;
use App\Alumno;
use App\CuentaPorCobrar;
use App\PlantillaPago;

/**
 *
 */
class MatriculaRepository
{

    public function save(Request $request)
    {
        $matriculas = Matricula::with('datosSeccion')->where($request->only(['id_alumno']))->get();
        $seccion    = Seccion::find($request->id_seccion);

        $anioSeccion = $seccion->datosAnioNivel->datosAnio->anio;

        $validacion = 0;
        foreach ($matriculas as $matricula) { 

            if ($matricula->datosSeccion->datosAnioNivel->datosAnio->anio == $anioSeccion) {
                $validacion = 1;
            }

        }

        $validacion2    = Matricula::where("id_seccion", $request->id_seccion)->count();
        $capacidad      = Seccion::find($request->id_seccion);
        $vacanteslibres = $capacidad->capacidad - $validacion2;

        if ($vacanteslibres >= 1) {
            if ($validacion == 0) {
                $matricula = Matricula::create($request->all());

                $alumno=Alumno::find($matricula->id_alumno);
                $alumno->nivel_id=$matricula->datosSeccion->datosGrado->datosNivel->id;
                $alumno->save();

                $anio=$seccion->datosAnioNivel->datosAnio->anio;

                $plantilla=PlantillaPago::where('anio',$anio)->where('grado_id',$seccion->grado)->first();
                if($plantilla){
                    foreach($plantilla->pagos  as $pago){
                        $valid = CuentaPorCobrar::where(['id_concepto' => $request->concepto, 'alumno' => $matricula->id_alumno])->count();
                        if ($valid == 0) {
                            CuentaPorCobrar::Create(
                                [
                                    "id_concepto" => $pago->pago_id,
                                    "alumno"      => $matricula->id_alumno,
                                    "estado"      => "Pendiente",
                                ]
                            );
                        }
                    }
                }

                return response()->json(['message' => 'Matricula Registrada Correctamente', 'success' => true, $vacanteslibres]);
            } else {
                return response()->json(['message' => 'El alumno solo puede tener una matricula  por  año  academico'], 422);
            }
        } else {
            return response()->json(['message' => 'No hay vacantes  libres para esta seccion'], 422);
        }

    }

}
