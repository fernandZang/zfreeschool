<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class matiereController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    public function index()
    {
            $matieres=matiere::paginate(4);
            return view('proviseur.taches.matiere.matiere_afficher',compact('matieres'));
            
    }
    
    public function create()
    {
        $matieres=matiere::paginate(6);
        return view('proviseur.taches.matiere.matiere_creer');
        
    }

    public function store(){
        $data=request()->validate([
            'nom' => ['required', 'string', 'max:255'],
        ]);
        $user=Auth::user();
        $matiere=matiere::create([
            'nom' => $data['nom'],
        ]);     
        $matierex=matiere::all();
        return redirect()->route('matiere.afficher');;
        
    }
}
