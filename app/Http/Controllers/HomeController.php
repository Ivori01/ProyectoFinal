<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $roles = $user->getRoleNames();
        if (count($roles) == 1) {
        $rol=$roles->first();
        return redirect(url(strtolower($rol)));
        }
        $rol=$roles->first();
  
        return view('home');
    }
}
