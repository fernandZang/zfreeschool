<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class isEnseignant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user=request()->user();
        if(strcasecmp($user["poste"],"enseignant")==0){
            return $next($request);            
        }
    }
}
