@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="bg-olive row">
        <div class="col-md-10">
            <h4 class="text-center text-lowercase text-bold"  > {{ __($ue->titre)}} </h4>
        </div>
        <div class="col-md-2 text-right" style="background-color:#48D1CC;">
            
            <a href="{{ route('creer.cours.cour') }}" class="text-bold text-primary alert-link"> ajouter un cours</a>
        </div>
      
    </div>
    <div class="row text-center mt-5 justify-content-left">
        
        @foreach ($ue->cour as $cour)
            <div class="col-md-4">
                <div class="border rounded col-md-11 mr-1 mb-3" style="background-color:#A0FFFF">
                    <div class="rounded-circle mt-1" style="background-color: #006400; border:3px solid red;">
                        
                        <form method="POST"  action="{{ route('affiche_cours') }}" class="alert">
                            @csrf
                            <input type="text" hidden name="id_cour" value="{{ __($cour->id)}}">                                        
                            <button type="submit" class="alert-link text-primary rounded-circle p-3" style="border: 4px solid red; background-color:#ADFF2F;">
                                {{ __('cours de '.$cour->enseignant->user->nom.' '.$cour->enseignant->user->prenom) }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach        
    </div>
</div>

@endsection
