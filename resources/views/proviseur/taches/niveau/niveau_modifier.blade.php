@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('creer le niveau') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('niveau.modifier') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Modifier le niveau') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ __($niveau->nom) }}"  autocomplete="nom" autofocus>
                                <input hidden id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ __($niveau->id) }}"  autocomplete="id" autofocus>
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="censeur_id" class="col-md-4 col-form-label text-md-right">{{ __('Censeur ') }}</label>
                            <div class="col-md-6">
                                <select class="form-control " id="censeur_id" name="censeur_id">
                                    @foreach ($censeurs as $censeur)
                                        <option value='{{ __($censeur->enseignant->id) }}'>{{ __($censeur->nom) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            
                        <div class="form-group row mb-0 vrai-btn">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('modifier le niveau') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
