<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class proviseurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    
    public function index()
    {   
        return view('proviseur.home');
        //dd("on a pas pu determiner si vous etes eleve ou enseignant");
    }
}
