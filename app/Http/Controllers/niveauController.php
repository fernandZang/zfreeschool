<?php

namespace App\Http\Controllers;

use App\Models\enseignant;
use App\Models\niveau;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class niveauController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    
    public function index()
    {
            $niveaux=niveau::orderBy('id','DESC')->paginate(4);
            //dd($niveaux[1]->enseignant_id);
            return view('proviseur.taches.niveau.niveau_afficher',compact('niveaux'));
    }
    
    public function create()
    {
        
        $censeurs=User::where('poste','censeur')->orwhere('poste','proviseur')->get();

        return view('proviseur.taches.niveau.niveau_creer',compact('censeurs'));
        
    }

    public function store(){
        $data=request()->validate([
            'nom' => ['required', 'string', 'max:255'],
        ]);
        //          MAUVAIS UTILISATEUR
        //dd($data);
        $user=Auth::user();
        
        $niveau=niveau::create([
            'nom' => $data['nom'],
            'enseignant_id'=>$user->enseignant->id,
        ]);     
        
        return redirect()->route('niveau.afficher');
        
    }
    public function update()
    {   
       $data=request();
       //dd($data);
        niveau::where('id',$data['id'])->update([
            'nom'=>$data->nom,
            'enseignant_id'=>$data->censeur_id,
        ]);
        return redirect()->route('niveau.afficher');
    }
    public function modifier()
    {   
       $data=request();
       //dd($data);
       $niveau=niveau::where('id',$data->id)->get();
       $niveau=$niveau[0];
       //dd($niveau);
       $censeurs=User::where('poste','censeur')->orwhere('poste','proviseur')->get();
       return view('proviseur.taches.niveau.niveau_modifier',compact('niveau','censeurs'));
    }
}
