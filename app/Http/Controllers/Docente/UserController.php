<?php
namespace App\Http\Controllers\Docente;
 
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Repositories\UserRepository;

class UserController extends Controller
{


    protected $user;

    public function __construct(UserRepository $user )
    {

     
        $this->user=$user;
   
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
      return $this->user->update($request,$id);
    }

public function profile()
{
    
   return view('docente.profile',['Persona'=>auth()->user()->persona]);
}



}
