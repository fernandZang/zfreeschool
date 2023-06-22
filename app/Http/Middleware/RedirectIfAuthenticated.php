<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                $user=Auth::user();
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
            }
        }

        return $next($request);
    }
}
