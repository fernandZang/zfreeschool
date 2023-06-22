<?php

namespace App\Http\Controllers;

use App\Models\ua;
use App\Models\ue;
use Illuminate\Http\Request;

class UeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    public function store(){
        $data=request()/*->validate([
            'titre'=>['required','string', 'max:255'],
            'ua_id'=>['required','integer'],
            'duree'=>['required','integer'],
        ])*/;
        $ue=ue::where('titre',$data['titre'])->where('ua_id',$data['ua_id'])->count();
        if(($data['titre']!=null)&&($data['duree']!=null)&&($ue==0)){
            
                //dd($data);
                $ue=ue::create([    
                    'titre' => $data['titre'],
                    'ua_id' => $data['ua_id'],
                    'duree' => $data['duree'],
                ]); 
        }
        $ua=ua::where('id',$data['ua_id'])->first();
        //dd($ua);
        return view('proviseur.taches.censeurs_role.projet_pedagogique.ajouter_ue',compact('ua'));
    }

    public function create(){
        $data=request();
        //dd($data);
        $ua=ua::where('id',$data['ua_id'])->first();
        //dd($ua);
        return view('proviseur.taches.censeurs_role.projet_pedagogique.ajouter_ue',compact('ua')); 
        
    }
}
