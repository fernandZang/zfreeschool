@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row text-center">
        
        @foreach ($niveaux as $niveau)
        <div class="col-md-4">
            <div>
                <table class="table table-bordered">
                    <thead>
                      <tr class="bg-olive">
                        <th class="text-center" colspan="2" > {{ __($niveau->nom)}} </th>
                      </tr>
                      <tr class="bg-olive">
                        <th class=" text-center">matiere</th>
                        <th  class=" text-center">gerer le projet</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($niveau->niveau_matiere as $niv_mat)
                            <tr class="">
                                <td class="text-green text-bold text-center  align-middle bg-cyan border-bottom border-dark">{{ __($niv_mat->matiere->nom) }}</td>
                                <td  class=" text-center border-bottom border-dark">
                                    <form method="POST"  action="{{ route('afficher.projet') }}">
                                        @csrf
                                        <input type="text" hidden name="niveau_id" value={{ __($niveau->id) }}>
                                        <input type="text" hidden name="niv_mat_id" value={{ __($niv_mat->id) }}>
                                        
                                        <button type="submit" class="p-1 m-0 mb-1 btn text-bold text-info">
                                            {{ __('Afficher le projet') }}
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('creer.module') }}">
                                        @csrf
                                        <input type="text" hidden name="niveau_id" value={{ __($niveau->id) }}>
                                        <input type="text" hidden name="projet_pedagogique_id" value={{ __($niv_mat->projet_pedagogique->id) }}>
                                        
                                        <button type="submit" class="p-1 m-0 btn text-bold text-info ">
                                            {{ __('creer projet') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach        
    </div>
</div>

@endsection
