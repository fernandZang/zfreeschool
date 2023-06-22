@extends('eleve.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @foreach ($niv->niveau_matiere as $matiere)
                <div class="col">
                    <div class="row bg-olive m-4 justify-content-center">
                        {{ __($matiere->matiere->nom)}}
                    </div>
                    @foreach ($matiere->projet_pedagogique->module as $mod)
                    <div class="row m-3">
                        
                        @foreach ($mod->ua as $ua)
                        
                            
                                @foreach ($ua->ue as $ue)
                                <div class="col-md-12 row border border-primary m-3 justify-content-center">
                                    <div class="row bg-green m-3">
                                        {{ __($ue->titre)}}
                                    </div>
                                    <div class="col-md-12 row">
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
                                @endforeach
                            
                        
                        @endforeach                   
                    </div>                            
                    @endforeach

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
