@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-olive">{{ __('Creer UA') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('matiere.niveau.ua')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Nom de l\'UA') }}</label>                            

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}"  autocomplete="titre" autofocus>
                                <input hidden id="module_id" type="number" class="form-control @error('module_id') is-invalid @enderror" name="module_id" value="{{ __($module->id) }}"  autocomplete="module_id" autofocus>
                                
                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duree" class="col-md-4 col-form-label text-md-right">{{ __('Durée de l\'ua') }}</label>                            

                            <div class="col-md-6">
                                <input id="duree" type="number" class="form-control @error('duree') is-invalid @enderror" name="duree" value="{{ old('duree') }}"  autocomplete="duree" autofocus>
                                
                                @error('duree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
                <div class="card-header bg-olive">{{ __('Liste des UA') }}</div>

                <div class="card-body">
                    @foreach ($module->ua as $ua)
                        <div class="row justify-content-center border-bottom border-info">
                            <div class="col-md-7">{{ __($ua->titre)}}</div>
                            <div class="col-md-5">
                                <form method="POST" action="{{route('creer.ue')}}">
                                    @csrf
                                    <input hidden id="ua_id" type="number" class="form-control @error('ua_id') is-invalid @enderror" name="ua_id" value="{{ __($ua->id) }}"  autocomplete="ua_id" autofocus>
                                    
                                    <div class="form-group m-1 p-0">
                                        <button type="submit" class="btn btn-primary p-1">
                                            {{ __('Creer UE') }}
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
