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
                      <tr class="bg-olive">
                        <th scope="col" class="d-flex justify-content-center">matiere existant</th>
                        <th  class=" justify-content-center">modifier</th>
                        <th  class=" justify-content-center">supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($matieres as $matiere)
                            <tr>
                                <td scope="row" class="d-flex justify-content-center">{{ __($matiere->nom) }}</td>
                                <td  class=" justify-content-center">{{ __('modifier') }}</td>
                                <td class=" justify-content-center">{{ __('supprimer') }}</td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>
                <div class="d-flex justify-content-center" > 
                  {!!$matieres->links()!!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group row mb-0 vrai-btn">
              <div class="col-md-6 offset-md-4">
                  <a href="{{route('matiere.creer')}}" class="btn btn-primary bg-olive">
                      {{ __('nouvelle matiere') }}
                  </a>
              </div>
          </div>
        </div>
    </div>
</div>

@endsection
