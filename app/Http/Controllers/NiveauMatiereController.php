<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use App\Models\niveau;
use App\Models\niveau_matiere;
use App\Models\projet_pedagogique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NiveauMatiereController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }

    public function index()
    {
            $matieres=niveau_matiere::paginate(4);
            return view('proviseur.taches.matiere.matiere_afficher',compact('matieres'));
            
    }
    
    public function create()
    {
        $niveaux=niveau::all();
        $matieres=matiere::all();
        //dd($niveaux);
        return view('proviseur.taches.niveau.choisir_niv_mat',compact('niveaux','matieres'));        
    }

    public function store(){
        $data=request()->validate([
            'niveau_id' => ['required', 'integer'],
            'matiere_id' => ['required', 'integer'],
            'coef' => ['required', 'integer'],
            'groupe' => ['required', 'integer'],
        ]);
        $user=Auth::user();
        $niv_mat=niveau_matiere::where("niveau_id",$data['niveau_id'])->where('matiere_id',$data['matiere_id'])->count();
        //dd($niv_mat);
        if($niv_mat==0){
            $matiere=niveau_matiere::create([
                'niveau_id' => $data['niveau_id'],
                'matiere_id' => $data['matiere_id'],
                'coef' => $data['coef'],
                'groupe' => $data['groupe'],
            ]);     
            $projet=projet_pedagogique::create([
                'niveau_matiere_id'=>$matiere['id'],
            ]);
            //dd('matiere');
            //$matierex=matiere::all();
        }
        return redirect()->route('matiere.niveau.projet.voir');
    }
}
