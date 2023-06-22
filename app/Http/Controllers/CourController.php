<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\devoir;
use App\Models\mauvaise_reponse;
use App\Models\module;
use App\Models\niveau;
use App\Models\niveau_matiere;
use App\Models\prerequi;
use App\Models\prerequis;
use App\Models\question as ModelsQuestion;
use App\Models\question;
use App\Models\situation_probleme;
use App\Models\ua;
use App\Models\ue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourController extends Controller
{
    private $id_cour;

    public function __construct()
    {
        $this->middleware('auth')->except([]);
    }
    
    public function index()
    {   
        if(Auth::user()->poste=='Elève'){
            $niv=Auth::user()->eleve->niveau;
            //dd($niv->niveau_matiere);
            return view('eleve.matiere',compact('niv'));
        }
        $mat=Auth::user()->enseignant->matiere;
        $niv_mats=niveau_matiere::where('matiere_id',$mat['id'])->get();
        return view('proviseur.enseignant.cours.index_cours',compact('niv_mats'));
        
    }

    public function index_ua()
    {   
        $data=request();
        //dd($data);
        $uas=ua::where('module_id',$data['module_id'])->get();
        //dd($uas[0]->module->projet_pedagogique);
        return view('proviseur.enseignant.cours.index_ua_cours',compact('uas'));
        
    }

    public function ue_cour(Request $request)
    {   
        $data=request(); 
        //dd($data);       
        $request->session()->put('ue_id', $data['ue_id']);
        $ue_id=$request->session()->get('ue_id','-1'); 
        
        $ue=ue::where('id',$ue_id)->first();        
        return view('proviseur.enseignant.cours.index_ue',compact('ue'));
    }
    public function ue_cour_vue(Request $request)
    {   
         
        $ue_id=$request->session()->get('ue_id','-1'); 
        
        $ue=ue::where('id',$ue_id)->first();        
        return view('proviseur.enseignant.cours.index_ue',compact('ue'));
    }
    public function create_cour(Request $request)
    {   
        
        $ue_id=$request->session()->get('ue_id','-1'); 
        //dd($ue_id);
        $ue=ue::where('id',$ue_id)->first();
        
        $user_id=Auth::user()->id;
        $cour=cour::create([
            'ue_id' => $ue_id,
            'statut' => 'non valide',
            'enseignant_id'=>$user_id,
            'etat' => 0,
        ]);        
        $request->session()->put('id_cour', $cour['id']);
        return redirect()->route('creer.cours.pre');
    }
    
    public function create_pre(Request $request){
        
        return view('proviseur.enseignant.cours.creer_cours_pre');
    }
//save prerequi ************************************************************
    
    public function store_pre(Request $request)
    {   
        
        
        $data=request();
        //dd($data);        
        $cour_id=$request->session()->get('id_cour','-1'); 

        $pre=prerequi::create([
            'contexte' => $data['contexte_pre'],
            'cour_id' => $cour_id,
        ]);
            
        for ($i=1;$i<$data['nbqst']+1;$i++){
            
            //dd($data['type_qst'.$i]);
            $qst=question::create([
                'type_question' => $data['type_qst'.$i],
                'numero_qst' => $i,
                'question' => $data['qst_numero'.$i],
                'reponse' => $data['reponse_numero'.$i],
                'explication' => $data['explication'.$i],
                'prerequi_id' => $pre['id'],
            ]);
            
            if (strcasecmp($qst['type_question'],"qru")==0){
                for($j=1;$j<=$data['nb_mr'.$i];$j++){
                    $fr=mauvaise_reponse::create([
                        'reponse_f' => $data['mr'.$i.'_'.$j],
                        'question_id' => $qst['id'],
                        ]);
                }

                //dd($qst->mauvaise_reponse);
            }
            
        };
        
        return redirect()->route('creer.cours.sp');
    }
    //          start SP +******************************************
    public function create_sp(Request $request){
        
        $cour_id=$request->session()->get('id_cour','-1');                
        $cour=cour::where('id',$cour_id)->first();
        //return view('proviseur.enseignant.cours.visualiser',compact('cour'));
        return view('proviseur.enseignant.cours.creer_cours_sp',compact('cour'));
    }

    // save SP and start TE ***********************************************************
    public function store_sp()
    {   
        $data=request();
        //dd($data);
        $sp=situation_probleme::create([
            'contexte' => $data['contexte_sp'],
            'cour_id' => $data['cour_id'],
        ]);
            
        for ($i=1;$i<$data['nbqst']+1;$i++){
            
            //dd($data['type_qst'.$i]);
            $qst=question::create([
                'type_question' => $data['type_qst'.$i],
                'numero_qst' => $i,
                'question' => $data['qst_numero'.$i],
                'reponse' => $data['reponse_numero'.$i],
                'explication' => $data['explication'.$i],
                'situation_probleme_id' => $sp['id'],
            ]);
            
            if (strcasecmp($qst['type_question'],"qru")==0){
                for($j=1;$j<=$data['nb_mr'.$i];$j++){
                    $fr=mauvaise_reponse::create([
                        'reponse_f' => $data['mr'.$i.'_'.$j],
                        'question_id' => $qst['id'],
                        ]);
                    }
                
                }
                
            };
            //dd('rest');
            return redirect()->route('creer.cours.te');
        }
        public function create_te(Request $request){
        
            $cour_id=$request->session()->get('id_cour','-1');                
            $cour=cour::where('id',$cour_id)->first();
            //return view('proviseur.enseignant.cours.visualiser',compact('cour'));
            return view('proviseur.enseignant.cours.creer_cours_te',compact('cour'));
        }


        //      save TE and start Devoir *************************************************************
        
        public function store_TE()
        {   
        $data=request();
        //dd($data);
        cour::where('id',$data['cour_id'])->update(['trace_ecrite'=>$data['contexte_sp']]);
            
        $cour=cour::where('id',$data['cour_id'])->first();
        return redirect()->route('creer.cours.devoir');
    }
    public function create_devoir(Request $request){
        $cour_id=$request->session()->get('id_cour','-1');                
        $cour=cour::where('id',$cour_id)->first();
        return view('proviseur.enseignant.cours.creer_cours_devoir',compact('cour'));
    }
    
    //      save Devoir *************************************************************
    public function store()
    {   
        $data=request();
        //dd($data);
        $devoir=devoir::create([
        'contexte' => $data['contexte_devoir'],
        'cour_id' => $data['cour_id'],
        ]);
        
        for ($i=1;$i<$data['nbqst']+1;$i++){
            
            //dd($data['type_qst'.$i]);
            $qst=question::create([
                'type_question' => $data['type_qst'.$i],
                'numero_qst' => $i,
            'question' => $data['qst_numero'.$i],
            'reponse' => $data['reponse_numero'.$i],
            'explication' => $data['explication'.$i],
            'devoir_id' => $devoir['id'],
        ]);
        
        if (strcasecmp($qst['type_question'],"qru")==0){
            for($j=1;$j<=$data['nb_mr'.$i];$j++){
                $fr=mauvaise_reponse::create([
                    'reponse_f' => $data['mr'.$i.'_'.$j],
                    'question_id' => $qst['id'],
                    ]);
                }
                
            }
            
        };
        $cour=$data['cour_id'];
        
        return redirect()->route('affiche.cours.pre',[$cour]);
        //return view('proviseur.enseignant.cours.visualisersp',compact('cour'));
    }

    public function affiche_cours(Request $request){
        
        $data=request(); 
        //dd($data);       
        $request->session()->put('id_cour', $data['id_cour']);
        $cour=$data['id_cour'];
        return redirect()->route('affiche.cours.pre',[$cour]);
    }
    public function indexpre(Request $request){
        $cour_id=$request->session()->get('id_cour','-1');
        $cour=cour::where('id',$cour_id)->first(); 
        //dd($test);
        if(Auth::user()->poste=='Elève'){
            //dd($niv->niveau_matiere);
            return view('eleve.visualiser',compact('cour'));
        }
        return view('proviseur.enseignant.cours.visualiser',compact('cour'));
        dd($cour);
    }
    public function indexsp(Request $request){
        $cour_id=$request->session()->get('id_cour','-1');  
        $cour=cour::where('id',$cour_id)->first();         
        //dd($cour);
        if(Auth::user()->poste=='Elève'){
            //dd($niv->niveau_matiere);
            return view('eleve.visualisersp',compact('cour'));
        }
        return view('proviseur.enseignant.cours.visualisersp',compact('cour'));
    }
    public function indexTE(Request $request){
        $cour_id=$request->session()->get('id_cour','-1');  
        $cour=cour::where('id',$cour_id)->first();         
        //dd($cour);
        if(Auth::user()->poste=='Elève'){
            //dd($niv->niveau_matiere);
            return view('eleve.visualiserTE',compact('cour'));
        }
        return view('proviseur.enseignant.cours.visualiserTE',compact('cour'));
    }
    public function indexDevoir(Request $request){
        $cour_id=$request->session()->get('id_cour','-1');  
        $cour=cour::where('id',$cour_id)->first();         
        //dd($cour);
        if(Auth::user()->poste=='Elève'){
            //dd($niv->niveau_matiere);
            return view('eleve.visualiserdevoir',compact('cour'));
        }
        return view('proviseur.enseignant.cours.visualiserdevoir',compact('cour'));
    }
    /*
    public function uploadImage(Request $request)
    {
        $imgpath = $request->file('file')->store('cours', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }*/


}
