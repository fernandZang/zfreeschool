<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\ua;
use Illuminate\Http\Request;

class UaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    public function store(){
        $data=request()/*->validate([
            'titre'=>['required','string', 'max:255'],
            'module_id'=>['required','integer'],
            'duree'=>['required','integer'],
        ])*/;
        $ua=ua::where('titre',$data['titre'])->where('module_id',$data['module_id'])->count();
        
        if(($data['titre']!=null)&&($data['duree']!=null)&&($ua==0)){
            //dd($data);
            $ua=ua::create([
                'titre' => $data['titre'],
                'module_id' => $data['module_id'],
                'duree' => $data['duree'],
            ]); 
            
            
        }
        $module=module::where('id',$data['module_id'])->first();
        return view('proviseur.taches.censeurs_role.projet_pedagogique.ajouter_ua',compact('module')); 
        dd($data['titre']);
    }
    public function create(){
        $data=request();
        //dd($data);
        $module=module::where('id',$data['module_id'])->first();
        //dd($module)
        return view('proviseur.taches.censeurs_role.projet_pedagogique.ajouter_ua',compact('module')); 
        
    }
}
