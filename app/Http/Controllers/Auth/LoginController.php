<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\eleve;
use App\Models\enseignant;
use App\Models\matiere;
use App\Models\niveau;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function initialisation(){
        $ztf=User::all('nom');
        $cmp=0;
        foreach ($ztf as $ztf1){
            if(strcasecmp($ztf1->nom,"zangue")==0){
                $cmp+=1;
                }    
        }

        if($cmp==0){
               
            $mat=matiere::create([
                'nom'=>'informatique',
            ]);
            $mat1=matiere::create([
                'nom'=>'mathematique',
            ]);
            $mat3=matiere::create([
                'nom'=>'anglais',
            ]);
            $user=User::create([
                    'nom' => 'zangue',
                    'prenom' =>'fernand',
                    'sexe' => 'masculin',
                    'statut'=>'valide',
                    'poste' => 'proviseur',
                    'date_n' => '1996-06-27',
                    'email' => 'fezata@gmail.com',
                    'password' => Hash::make('12345678'),
                    
            ]);
                
            enseignant::create([
                'user_id'=>$user['id'],
                'matiere_id'=>$mat['id'],
            ]);

            $user=User::create([
                'nom' => 'TONLE',
                'prenom' =>'FRANCK',
                'sexe' => 'masculin',
                'statut'=>'valide',
                'poste' => 'censeur',
                'date_n' => '1996-06-27',
                'email' => 'fezata1@gmail.com',
                'password' => Hash::make('12345678'),
                
            ]);
            
            enseignant::create([
                'user_id'=>$user['id'],
                'matiere_id'=>$mat['id'],
            ]);


            $user=User::create([
                'nom' => 'kenfack',
                'prenom' =>'rodolfe',
                'sexe' => 'masculin',
                'statut'=>'valide',
                'poste' => 'enseignant',
                'date_n' => '1996-06-27',
                'email' => 'fezata3@gmail.com',
                'password' => Hash::make('12345678'),
                
            ]);
            
            enseignant::create([
                'user_id'=>$user['id'],
                'matiere_id'=>$mat['id'],
            ]);

            $user=User::create([
                'nom' => 'tsafack',
                'prenom' =>'valdez',
                'sexe' => 'masculin',
                'statut'=>'valide',
                'poste' => 'enseignant',
                'date_n' => '1996-06-27',
                'email' => 'fezata4@gmail.com',
                'password' => Hash::make('12345678'),
                
            ]);
            
             
            $niv=niveau::create([
                'nom'=>'SIXIEME',
                'enseignant_id'=>1
            ]);
            $niv2=niveau::create([
                'nom'=>'CINQUIEME',
                'enseignant_id'=>1
            ]);

            enseignant::create([
                'user_id'=>$user['id'],
                'matiere_id'=>$mat['id'],
            ]);

            $user=User::create([
                'nom' => 'eleve',
                'prenom' =>'eleve',
                'statut'=>'valide',
                'sexe' => 'masculin',
                'poste' => 'eleve',
                'date_n' => '1996-06-27',
                'email' => 'eleve@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
            eleve::create([
                'user_id'=>$user['id'],
                'enseignant_id'=>1,
                'niveau_id'=>$niv['id'],
            ]);

        }
        return '';
    }

    public function __construct()
    {
        $this->initialisation();
        $this->middleware('guest')->except('logout');
    } 

}
