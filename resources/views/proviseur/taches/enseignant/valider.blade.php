@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="bg-olive card-header">
                enseignants validés
            </div>
            <div>
                
                <table class="table table-bordered">
                    <thead>
                      
                      <tr class="bg-olive">
                        <th scope="col" class="justify-content-center">nom</th>
                        <th scope="col" class="justify-content-center">prenom</th>
                        <th scope="col" class="justify-content-center">matiere</th>
                        <th scope="col" class="justify-content-center">poste</th>
                        <th scope="col" class="justify-content-center">statut</th>
                        <th scope="col" class="justify-content-center">cliquer pour valider</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($enseignants as $enseignant)
                            <tr>
                                <th scope="row" class="justify-content-center">{{ __($enseignant->nom) }}</th>
                                <td class="justify-content-center">{{ __($enseignant->prenom) }}</td>
                                <td class="justify-content-center">{{ __($enseignant->enseignant->matiere->nom) }}</td>
                                <td class="justify-content-center">{{ __($enseignant->poste) }}</td>
                                <td class="justify-content-center">{{ __($enseignant->statut) }}</td>
                                <td class="justify-content-center">
                                    <form method="POST" action="{{ route('enseignant.valider') }}">
                                        @csrf
                                        <input type="text" hidden name="id" value={{ __($enseignant->id) }}>
                                        <select hidden class="form-control " id="statut" name="statut">
                                            <option  selected value="{{ __('valide') }}">{{ __('valide') }}</option>
                                        </select>

                                        <button type="submit" class="btn btn-primary">
                                            {{ __('valider') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>
                
              </div>
        </div>
        <div class="col-md-2">
          <div class="row mb-0 vrai-btn mt-4">
              <div class="col-md-12">
                  <a href="{{route('enseignant.valide')}}" class="btn btn-primary bg-olive">
                      {{ __('enseignants validés') }}
                  </a>
              </div>
          </div>
        </div>
    </div>
</div>

@endsection
