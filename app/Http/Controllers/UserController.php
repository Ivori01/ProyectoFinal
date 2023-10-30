<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {

        $this->user = $user;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user=auth()->user();
        $user->update($request->only('password'));
        return response()->json(['message'=>"Registro actualizado correctamente"]);
    }

    public function updateInfo(Request $request)
    {
        $persona=auth()->user()->persona;
        $persona->update($request->only('descripcion','facebook','whatsapp','instagram','foto'));
        return response()->json(['message'=>'Registro actualizado correctamente']);
    }

    public function index()
    {
        return view('profile', ['Persona' => auth()->user()->persona]);
    }

    public function myProfile()
    {

        return view('myProfile', ['Persona' => auth()->user()->persona]);
    }
     public function mySettings()
    {

        return view('mySettings', ['Persona' => auth()->user()->persona]);
    }
}
