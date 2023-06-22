<?php

namespace App\Http\Controllers;

use App\Models\enseignant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class enseignantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    
    public function index()
    {   
        return view('enseignant.home');
    }

    public function valider()
    {   
        $enseignants=User::where('statut','pas encore valide')->where('poste','enseignant')->get();
        
        return view('proviseur.taches.enseignant.valider',compact('enseignants'));
    }



    public function validation()
    {   
       $data=request();
       
        User::where('id',$data['id'])->update(['statut'=>'valide']);
        
        return redirect()->route('enseignant.valider');
    }
    public function nomination()
    {   
       $data=request();
//        dd($data);
        User::where('id',$data['id'])->update(['poste'=>$data->poste]);
        
        return redirect()->route('enseignant.valide');;
    }

    public function valide()
    {   
        //$enseignants=enseignant::where(['statut','valide'])->get();
        $enseignants=DB::select("
            select users.nom ,users.prenom ,users.statut ,users.poste ,users.id ,matieres.nom as matiere 
                from users
                inner join enseignants on enseignants.user_id=users.id 
                inner join matieres on enseignants.matiere_id=matieres.id
                where users.statut='valide' and users.email!='fezata@gmail.com'
                order by users.poste, users.nom, users.prenom "
        );
            
        //dd($enseignants);
        
        return view('proviseur.taches.enseignant.valide',compact('enseignants'));
    }
}
