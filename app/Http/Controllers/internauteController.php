<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use App\Models\niveau;
use Illuminate\Http\Request;

class internauteController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index()
    {   
        $niveaux=niveau::all();
        $matieres=matiere::all();
        return view('internaute.home',compact('niveaux','matieres'));
        //dd("on a pas pu determiner si vous etes eleve ou enseignant");
    }

}
