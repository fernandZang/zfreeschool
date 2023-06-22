<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\isEnseignant;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
// route pour l'enseignant
Route::middleware(['isEnseignant',])->prefix('enseignant')->group(function(){
    
    Route::get('/', [App\Http\Controllers\enseignantController::class, 'index'])->name('home.enseignant');
});

// route pour le censeur
Route::group(['middleware' => 'isCenseur', 'prefix'=>'censeur',], function(){
    Route::get('/', [App\Http\Controllers\eleveController::class, 'index'])->name('home.censeur');
});

// route pour le proviseur
Route::group(['middleware' => 'isProviseur', 'prefix'=>'proviseur',], function(){
    Route::get('/', [App\Http\Controllers\proviseurController::class, 'index'])->name('home.proviseur');

    Route::get('/creer/niveau', [App\Http\Controllers\niveauController::class, 'create'])->name('niveau.creer');
    Route::post('/creer/niveau', [App\Http\Controllers\niveauController::class, 'store'])->name('niveau.creer');
    Route::post('/modifier/niveau/modification', [App\Http\Controllers\niveauController::class, 'modifier'])->name('niveau.modifier.valider');
    Route::post('/modifier/niveau', [App\Http\Controllers\niveauController::class, 'update'])->name('niveau.modifier');
    Route::get('/supprimer/niveau', [App\Http\Controllers\niveauController::class, 'destroy'])->name('niveau.supprimer');
    Route::get('/afficher/niveau', [App\Http\Controllers\niveauController::class, 'index'])->name('niveau.afficher');
    

    Route::get('/matiere/niveau', [App\Http\Controllers\NiveauMatiereController::class, 'create'])->name('matiere.niveau.creer');
    Route::post('/matiere/niveau', [App\Http\Controllers\NiveauMatiereController::class, 'store'])->name('matiere.niveau.creer');


    Route::get('/creer/classe', [App\Http\Controllers\classeController::class, 'create'])->name('classe.creer');
    Route::post('/creer/classe', [App\Http\Controllers\classeController::class, 'store'])->name('classe.creer');
    Route::get('/modifier/classe', [App\Http\Controllers\classeController::class, 'modifier'])->name('classe.modifier');
    Route::post('/modifier/classe', [App\Http\Controllers\classeController::class, 'update'])->name('classe.modifier');
    Route::get('/supprimer/classe', [App\Http\Controllers\classeController::class, 'destroy'])->name('classe.supprimer');
    Route::get('/afficher/classe', [App\Http\Controllers\classeController::class, 'index'])->name('classe.afficher');


    Route::get('/valider/enseignants', [App\Http\Controllers\enseignantController::class, 'valider'])->name('enseignant.valider');
    Route::post('/valider/enseignants', [App\Http\Controllers\enseignantController::class, 'validation'])->name('enseignant.valider');
    Route::post('/nomination/enseignants', [App\Http\Controllers\enseignantController::class, 'nomination'])->name('enseignant.nomination');
    Route::get('/valide/enseignants', [App\Http\Controllers\enseignantController::class, 'valide'])->name('enseignant.valide');
    Route::get('/suprimer/enseignant', [App\Http\Controllers\enseignantController::class, 'destroy'])->name('enseignant.supprimer');
    Route::post('/changer/grade/enseignant', [App\Http\Controllers\enseignantController::class, 'grade'])->name('enseignant.grade');
    Route::post('/changer/grade/enseignant', [App\Http\Controllers\enseignantController::class, 'update'])->name('enseignant.grade');
    
    
    Route::get('/valider/eleve', [App\Http\Controllers\eleveController::class, 'valider'])->name('eleve.valider');
    Route::get('/suprimer/eleve', [App\Http\Controllers\eleveController::class, 'destroy'])->name('eleve.supprimer');
    Route::get('/changer/niveau/eleve', [App\Http\Controllers\eleveController::class, 'modifier_niveau'])->name('eleve.niveau');
    Route::post('/changer/niveau/eleve', [App\Http\Controllers\eleveController::class, 'update'])->name('eleve.niveau');
    Route::post('/changer/classe/eleve', [App\Http\Controllers\eleveController::class, 'modifier'])->name('eleve.classe');
    Route::post('/changer/classe/eleve', [App\Http\Controllers\eleveController::class, 'update'])->name('eleve.classe');

 

    Route::get('/creer/matiere', [App\Http\Controllers\matiereController::class, 'create'])->name('matiere.creer');
    Route::post('/creer/matiere', [App\Http\Controllers\matiereController::class, 'store'])->name('matiere.creer');
    Route::get('/affiche/matieres/creer', [App\Http\Controllers\matiereController::class, 'index'])->name('matiere.afficher');
    Route::get('/modifier/matiere', [App\Http\Controllers\matiereController::class, 'update'])->name('matiere.modifier');
    Route::get('/supprimer/matiere', [App\Http\Controllers\matiereController::class, 'destroy'])->name('matiere.supprimer');
    

   //Route::get('/creer/projet-pedagogique', [App\Http\Controllers\mmooController::class, 'create'])->name('matiere.creer');
   //Route::post('/creer/projet-pedagogique', [App\Http\Controllers\mmooController::class, 'store'])->name('matiere.creer');
    
    
    Route::get('/matieres/niveau/projet', [App\Http\Controllers\ProjetPedagogiqueController::class, 'index'])->name('matiere.niveau.projet.voir');
    Route::post('/afficher/matieres/niveau/projet', [App\Http\Controllers\ProjetPedagogiqueController::class, 'afficher'])->name('afficher.projet');
    Route::post('/matieres/niveau/projet/creer', [App\Http\Controllers\ProjetPedagogiqueController::class, 'create'])->name('matiere.niveau.projet.creer');
    
    Route::post('/module/creer/projet', [App\Http\Controllers\ModuleController::class, 'create'])->name('creer.module');
    Route::post('/module/stockage/projet', [App\Http\Controllers\ModuleController::class, 'store'])->name('module.creer');
    
    Route::post('/ua/creer/projet', [App\Http\Controllers\UaController::class, 'create'])->name('creer.ua');
    Route::post('/ua/niveau/projet', [App\Http\Controllers\UaController::class, 'store'])->name('matiere.niveau.ua');
    
    Route::post('/ue/creer/projet', [App\Http\Controllers\UeController::class, 'create'])->name('creer.ue');
    Route::post('/ue/niveau/projet', [App\Http\Controllers\UeController::class, 'store'])->name('matiere.niveau.ue');
    
    Route::get('/cours', [App\Http\Controllers\CourController::class, 'index'])->name('affiche.cours');
    Route::post('/cours/ua', [App\Http\Controllers\CourController::class, 'index_UA'])->name('affiche.ua.cours');
    Route::post('/cours_ue', [App\Http\Controllers\CourController::class, 'ue_cour'])->name('affiche.ue.cours');
    Route::get('/cours_ue', [App\Http\Controllers\CourController::class, 'ue_cour_vue'])->name('affiche.ue.cours');
    Route::get('/cours/creer', [App\Http\Controllers\CourController::class, 'create_cour'])->name('creer.cours.cour');
    Route::get('/cours/creer/prerequis', [App\Http\Controllers\CourController::class, 'create_pre'])->name('creer.cours.pre');
    Route::post('/cours/creer/situation/probleme', [App\Http\Controllers\CourController::class, 'store_pre'])->name('creer.cours.store');
    Route::get('/cours/creer/situation/probleme', [App\Http\Controllers\CourController::class, 'create_sp'])->name('creer.cours.sp');
    Route::post('/cours/creer/sp', [App\Http\Controllers\CourController::class, 'store_sp'])->name('creer.cours.store');
    Route::get('/cours/creer/resume', [App\Http\Controllers\CourController::class, 'create_te'])->name('creer.cours.te');
    Route::post('/cours/creer/TE', [App\Http\Controllers\CourController::class, 'store_TE'])->name('store.cours.te');
    Route::get('/cours/creer/devoir', [App\Http\Controllers\CourController::class, 'create_devoir'])->name('creer.cours.devoir');
    Route::post('/cours/niveau/projet', [App\Http\Controllers\CourController::class, 'store'])->name('matiere.niveau.cours');
    Route::post('/cours/choix', [App\Http\Controllers\CourController::class, 'affiche_cours'])->name('affiche_cours');
    
    Route::get('/cours/prerequis', [App\Http\Controllers\CourController::class, 'indexpre'])->name('affiche.cours.pre');
    Route::get('/cours/situation_probleme', [App\Http\Controllers\CourController::class, 'indexsp'])->name('affiche.cours.sp');
    Route::get('/cours/trace_ecrite', [App\Http\Controllers\CourController::class, 'indexTE'])->name('affiche.cours.TE');
    Route::get('/cours/devoir', [App\Http\Controllers\CourController::class, 'indexDevoir'])->name('affiche.cours.Devoir');
    
    
    //     ***************************************************************test
    Route::post('/cours/image/upload', 'CourController@uploadImage')->name('cours.image.upload');
    
    
    
    
    
    
    
    
});

// route pour l'eleve
Route::group(['middleware' => 'isEleve', 'prefix'=>'eleve',], function(){
    Route::get('/', [App\Http\Controllers\eleveController::class, 'index'])->name('home.eleve');
    Route::get('/cours', [App\Http\Controllers\CourController::class, 'index'])->name('affiche.cours');
    Route::post('/cours/choix', [App\Http\Controllers\CourController::class, 'affiche_cours'])->name('affiche_cours');
    Route::get('/cours/prerequis', [App\Http\Controllers\CourController::class, 'indexpre'])->name('affiche.cours.pre');
    Route::get('/cours/situation_probleme', [App\Http\Controllers\CourController::class, 'indexsp'])->name('affiche.cours.sp');
    Route::get('/cours/trace_ecrite', [App\Http\Controllers\CourController::class, 'indexTE'])->name('affiche.cours.TE');
    Route::get('/cours/devoir', [App\Http\Controllers\CourController::class, 'indexDevoir'])->name('affiche.cours.Devoir');
});

// route pour l'internaute
Route::group(['middleware'=>'guest'], function() {
    Route::get('/', [App\Http\Controllers\internauteController::class, 'index'])->name('home.internaute');
    
});

Route::get('login',array('as'=>'login',function(){
    return Redirect::route('home.internaute');
}));

Route::get('register',array('as'=>'register',function(){
    return Redirect::route('home.internaute');
}));

Route::get('home',function(){
    return Redirect::route('home.internaute');
});
