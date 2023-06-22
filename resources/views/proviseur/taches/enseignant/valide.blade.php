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
                        <th scope="col" class="justify-content-center">changer poste</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($enseignants as $enseignant)
                            <tr>
                                <th scope="row" class="justify-content-center">{{ __($enseignant->nom) }}</th>
                                <td class="justify-content-center">{{ __($enseignant->prenom) }}</td>
                                <td class="justify-content-center">{{ __($enseignant->matiere) }}</td>
                                <td class="justify-content-center">{{ __($enseignant->poste) }}</td>
                                <td class="justify-content-center dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        modifier
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <form method="POST" action="{{ route('enseignant.nomination') }}">
                                            @csrf
                                            <input type="text" hidden name="id" value={{ __($enseignant->id) }}>
                                            <select hidden class="form-control " id="poste" name="poste">
                                                <option  selected value="{{ __('enseignant') }}">{{ __('enseignant') }}</option>
                                            </select>
                                            <button type="submit" class="btn bg-primary dropdown-item mb-1">
                                                {{ __('enseignant') }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('enseignant.nomination') }}">
                                            @csrf
                                            <input type="text" hidden name="id" value={{ __($enseignant->id) }}>
                                            <select hidden class="form-control " id="poste" name="poste">
                                                <option  selected value="{{ __('censeur') }}">{{ __('censeur') }}</option>
                                            </select>
                                            <button type="submit" class="btn bg-primary  dropdown-item mb-1">
                                                {{ __('censeur') }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('enseignant.nomination') }}">
                                            @csrf
                                            <input type="text" hidden name="id" value={{ __($enseignant->id) }}>
                                            <select hidden class="form-control " id="poste" name="poste">
                                                <option  selected value="{{ __('proviseur') }}">{{ __('proviseur') }}</option>
                                            </select>
                                            <button type="submit" class="btn bg-primary dropdown-item">
                                                {{ __('proviseur') }}
                                            </button>
                                        </form>
                                    </div>
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
                    <a href="{{route('enseignant.valider')}}" class="btn btn-primary bg-olive">
                        {{ __('valider enseignants') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
