<?php
namespace App\Repositories;

use App\Horario;
use App\SeccionDocenteCurso;
use Illuminate\Http\Request;

/**
 *
 */
class HorarioRepository
{

    public function all()
    {
        return Horario::orderBy('nivel', 'asc')->orderBy('grado', 'asc')->orderBy('letra', 'asc')->get();
    }

    public function save(Request $request)
    {

        $horainicio = date("H:i:s", strtotime(substr($request->value, 0, 8)));
        $horafin    = date("H:i:s", strtotime(substr($request->value, 8, 8)));

        $secciondocente = SeccionDocenteCurso::find($request->curso)->first();
        $cursos         = SeccionDocenteCurso::where("seccion", $secciondocente->seccion)->get();
        $docentehoras   = SeccionDocenteCurso::where("docente", $secciondocente->docente)->get();
        

        $countcursos = 0;
        foreach ($cursos as $curso) {
            $validar = Horario::where(["horainicio" => $horainicio, "horafin" => $horafin, "dia" => $request->dia, "seccion_docente_curso" => $curso->id])->count();
            if ($validar != 0) {
                $countcursos++;
            }
        }

        $countdocentehoras = 0;
        foreach ($docentehoras as $curso) {
            $validar = Horario::where(["horainicio" => $horainicio, "horafin" => $horafin, "dia" => $request->dia, "seccion_docente_curso" => $curso->id])->count();
            if ($validar != 0) {
                $countdocentehoras++;
            }
        }

        if ($countcursos == 0 && $countdocentehoras == 0) {
            $Horario                        = new Horario;
            $Horario->dia                   = $request->dia;
            $Horario->horainicio            = $horainicio;
            $Horario->horafin               = $horafin;
            $Horario->seccion_docente_curso = $request->curso;

            $Horario->save();

            return response()->json(['message' => 'Registro agregado correctamente', 'success' => true, $countdocentehoras]);
        } else {

            if ($countcursos != 0) {
                return response()->json(['message' => 'Conflicto de horario dia [[' . $request->dia . ']] hora [[' . $request->value . ']]'], 422);
            }
            if ($countdocentehoras) {
                return response()->json(['message' => 'Conflicto de horario de docente dia [[' . $request->dia . ']] hora [[' . $request->value . ']] '], 422);
            }

        }

    }

    public function find($id)
    {

        return Horario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {

        $validacion = Horario::where($request->only(['grado', 'letra', 'nivel']))->where('idHorario', '<>', $id)->count();

        if ($validacion == 0) {
            $Horario = Horario::findOrFail($id);
            $Horario->update($request->all());
            return response()->json(['message' => 'Horario Actualizada Correctamente', 'success' => true]);
        } else {
            return response()->json(['message' => 'Horario Duplicada '], 422);
        }

    }

    public function destroy($id)
    {

        if (Horario::find($id)->delete()) {
            return response()->json(['message' => 'Registro eliminado correctamente', 'success' => true]);
        } else {
            return response()->json(['message' => 'No se puede  eliminar el registro'], 422);
        }

    }

}
