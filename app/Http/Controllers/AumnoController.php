<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AumnoController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('alumnos.alumnos',compact('users'));
    }
}
