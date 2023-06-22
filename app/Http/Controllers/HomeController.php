<?php

namespace App\Http\Controllers;

use App\Models\niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $niveaux=niveau::all();
        session()->put('niveaux',$niveaux);

        if(strcasecmp($user["poste"],"Elève")==0){
            return redirect()->route('home.eleve');
        }
        elseif(strcasecmp($user["poste"],"enseignant")==0){
            return redirect()->route('home.enseignant');
        }
        elseif(strcasecmp($user["poste"],"censeur")==0){
            return redirect()->route('home.censeur');;
        }
        elseif(strcasecmp($user["poste"],"proviseur")==0){
            return redirect()->route('home.proviseur');
        };
        return 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb';
    }
}
