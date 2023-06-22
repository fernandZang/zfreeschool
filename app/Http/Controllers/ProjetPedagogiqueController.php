<?php

namespace App\Http\Controllers;

use App\Models\niveau;
use App\Models\niveau_matiere;
use Illuminate\Http\Request;

class ProjetPedagogiqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    
    public function index()
    {   
        $niveaux=niveau::all();
        //dd($niveaux[0]->niveau_matiere);
        return view('proviseur.taches.censeurs_role.projet_pedagogique.projet',compact('niveaux'));
        
    }

    
    public function afficher()
    {   
       $data=request();
       //dd($data);
       $niv_mat=niveau_matiere::where('id',$data->niv_mat_id)->first();
       //dd($niv_mat);
       
       return view('proviseur.taches.censeurs_role.projet_pedagogique.affiche_projet_niveau',compact('niv_mat'));
    }
    

    

}
