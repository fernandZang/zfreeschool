@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div>
                <table class="table table-bordered">
                    <thead>
                      <tr class="bg-olive text-center">
                        <th scope="col" class="justify-content-center">niveau existant</th>
                        <th scope="col" class="justify-content-center">Censeur responsable</th>
                        <th scope="col" class="justify-content-center">modifier</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($niveaux as $niveau)
                            <tr>
                                <td scope="row" class="justify-content-center">{{ __($niveau->nom) }}</td>
                                <td class="justify-content-center">{{ __($niveau->enseignant->user->nom) }}</td>
                                <td class="justify-content-center">
                                    <form method="POST" action="{{ route('niveau.modifier.valider') }}">
                                        @csrf
                                        <input type="text" hidden name="id" value={{ __($niveau->id) }}>
                                        
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('modifier') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>
                <div class="d-flex justify-content-center" > 
                  {{$niveaux->links()}}
                </div>
              </div>
        </div>
        <div class="col-md-4">
          <div class="form-group row mb-0 vrai-btn">
              <div class="col-md-6 offset-md-4">
                  <a href="{{route('niveau.creer')}}" class="btn btn-primary bg-olive">
                      {{ __('creer un niveau') }}
                  </a>
              </div>
          </div>
        </div>
    </div>
</div>

@endsection
