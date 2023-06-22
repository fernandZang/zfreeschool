<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\niveau_matiere;
use App\Models\projet_pedagogique;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    public function create()
    {   
       $data=request();
       //dd($data);
       $projet_pedagogique=projet_pedagogique::where('id',$data->projet_pedagogique_id)->first();
    
       return view('proviseur.taches.censeurs_role.projet_pedagogique.ajouter_mod',compact('projet_pedagogique'));
    }
    public function store(){
        $data=request()/*->validate([
            'titre'=>['required','string', 'max:255'],
            'projet_pedagogique_id'=>['required','integer'],
            'duree'=>['required','integer'],
        ])*/;
        
        $module=module::where('titre',$data['titre'])->where('projet_pedagogique_id',$data['projet_pedagogique_id'])->count();
        if(($data['titre']!=null)&&($data['duree']!=null)&&($module==0)){
            //dd('bien');
            $module=module::create([
                'titre' => $data['titre'],
                'projet_pedagogique_id' => $data['projet_pedagogique_id'],
                'duree' => $data['duree'],
            ]); 
        }
        $projet_pedagogique=projet_pedagogique::where('id',$data['projet_pedagogique_id'])->first();
        return view('proviseur.taches.censeurs_role.projet_pedagogique.ajouter_mod',compact('projet_pedagogique')); 
        
        dd($data['titre']);
    }
}
