@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-olive">{{ __('Ajouter UE de l\'UA '.$ua->titre) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('matiere.niveau.ue')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="titre" class="col-md-5 col-form-label text-md-right">{{ __('Nom de l\'unité d\'enseignement') }}</label>                            

                            <div class="col-md-7">
                                <input hidden id="ua_id" type="number" class="form-control @error('ua_id') is-invalid @enderror" name="ua_id" value="{{ __($ua->id) }}"  autocomplete="ua_id" autofocus>
                                <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}"  autocomplete="titre" autofocus>
                                
                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duree" class="col-md-5 col-form-label text-md-right">{{ __('Durée l\'ue') }}</label>                            

                            <div class="col-md-7">
                                <input id="duree" type="number" class="form-control @error('duree') is-invalid @enderror" name="duree" value="{{ old('duree') }}"  autocomplete="duree" autofocus>
                                
                                @error('duree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continuer') }}
                                </button>
                            </div>
                        </div>    
                    
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-5 text-center">
            <div class="card">
                <div class="card-header bg-olive">{{ __('Liste des UE') }}</div>

                <div class="card-body">
                    @foreach ($ua->ue as $ue)
                        <div class="row justify-content-center border-bottom border-info">
                            <div class="col-md-7">{{ __($ue->titre)}}</div>
                            <div class="col-md-5">
                                <form method="POST" action="{{route('creer.ua')}}">
                                    @csrf
                                    <input hidden id="module_id" type="number" class="form-control @error('module_id') is-invalid @enderror" name="module_id" value="{{ __($ue->id) }}"  autocomplete="module_id" autofocus>
                                    
                                    <div class="form-group m-1 p-0">
                                        <button type="submit" class="btn btn-primary p-1">
                                            {{ __('modifier UE') }}
                                        </button>
                                    </div>  
                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
