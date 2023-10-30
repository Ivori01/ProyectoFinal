<?php
namespace App\Http\Controllers\Director;

use App\Descuento;
use App\Http\Controllers\Controller;
use App\Repositories\DescuentoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DescuentoController extends Controller
{

    protected $descuento;

    public function __construct(DescuentoRepository $descuento)
    {
        $this->descuento = $descuento;

    }

    public function getAll()
    {

        $descuentos = Descuento::all();
        $output     = array('rows' => array());
        foreach ($descuentos as $descuento) {

            $actionButton = '<div class=" action-buttons">

               <a class="text-success" data-target="#modal-update" href="#" data-toggle="modal"  onclick="editdescuento(' . "'" . route("Director.Descuento.Edit", ["id" => $descuento->id]) . "'" . ')">
        <i class="ace-icon fa fa-pen bigger-130"></i>
        </a>

                    <a class="text-danger"  data-target="#modal-destroy" href="" data-toggle="modal" onclick="deleteS(' . "'" . route('Director.Descuento.Destroy', ['id' => $descuento->id]) . "'" . ')">
                    <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a>
                    </div>
        ';

            $output['rows'][] = array(

                $descuento->descripcion,
                $descuento->cantidad,

                $actionButton,

            );
        }

        return response()->json($output);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('director.contabilidad.concepto-descuento');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->descuento->save($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Curso = descuento::findOrFail($id);
        $ruta  = route("Director.Descuento.Update", ["id" => $Curso["id"]]);

        return response()->json(["datos" => $Curso, "ruta" => $ruta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->descuento->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return $this->descuento->destroy($id);
    }
}
