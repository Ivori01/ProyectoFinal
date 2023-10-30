<?php
namespace App\Http\Controllers\Secretaria;

use App\Http\Controllers\Controller;
use App\Persona;
use App\Repositories\PersonaRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class UserController extends Controller
{

    protected $persona;
    protected $user;

    public function __construct(PersonaRepository $persona, UserRepository $user)
    {

        $this->persona = $persona;
        $this->user    = $user;

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
        return $this->user->update($request, $id);
    }

    public function profile()
    {

        return view('secretaria.profile', ['Persona' => auth()->user()->persona]);
    }

}
