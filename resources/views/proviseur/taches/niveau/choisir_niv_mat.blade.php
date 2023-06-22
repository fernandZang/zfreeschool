@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="bg-olive card-header">
                ajouter une matiere a un niveau
            </div>
            <div>
                
                <div class="table table-bordered">
                    <div class="card-body">
                        <form id="register" method="POST" action="{{ route('matiere.niveau.creer') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="niveau_id" class="col-md-4 col-form-label text-md-right">{{ __('Niveau ') }}</label>
                                <div class="col-md-6">
                                    <select name="niveau_id" id="niveau_id" class="form-control">
                                        @foreach ($niveaux as $niveau)
                                        <option value="{{ __($niveau->id) }}">{{ __($niveau->nom) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="matiere_id" class="col-md-4 col-form-label text-md-right">{{ __('Matiere ') }}</label>
                                <div class="col-md-6">
                                    <select name="matiere_id" id="matiere_id" class="form-control">
                                        @foreach ($matieres as $matiere)
                                        <option value="{{ __($matiere->id) }}">{{ __($matiere->nom) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="groupe" class="col-md-4 col-form-label text-md-right">{{ __('groupe') }}</label>
                                <div class="col-md-6">
                                    <select name="groupe" id="groupe" class="form-control">
                                        <option value="1">goupe 1</option>
                                        <option value="2">goupe 2</option>
                                        <option value="3">goupe 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="coef" class="col-md-4 col-form-label text-md-right">{{ __('Coef') }}</label>
    
                                <div class="col-md-6">
                                    <input id="coef" type="number" class="form-control @error('coef') is-invalid @enderror" name="coef" value="{{ old('coef') }}"  autocomplete="coef" autofocus>
    
                                    @error('coef')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
                            <div class="form-group row mb-0 vrai-btn">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ajouter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>                     
                </div>
                
              </div>
        </div>
        <div class="col-md-2">
          <div class="form-group row mb-0 vrai-btn">
              <div class="col-md-6 offset-md-4">
                  <a href="{{route('enseignant.valide')}}" class="btn btn-primary bg-olive">
                      {{ __('creer un enseignant') }}
                  </a>
              </div>
          </div>
          <div class="form-group row mb-0 vrai-btn">
            <div class="col-md-6 offset-md-4">
                <a href="{{route('enseignant.valider')}}" class="btn btn-primary bg-olive">
                    {{ __('valider les enseignants') }}
                </a>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
