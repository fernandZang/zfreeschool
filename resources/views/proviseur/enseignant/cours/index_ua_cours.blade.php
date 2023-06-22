@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="bg-olive">
      <h3 class="text-center text-uppercase font-weight-bold" > {{ __($uas[0]->module->projet_pedagogique->niveau_matiere->matiere->nom.' '.$uas[0]->module->projet_pedagogique->niveau_matiere->niveau->nom)}} </h3>
    </div>
    <div class="bg-olive">
      <h4 class="text-center text-lowercase"  > {{ __('Module '.$uas[0]->module->titre)}} </h4>
    </div>
    <div class="row text-center">
        @php($cpt=0)
        @foreach ($uas as $ua)
        <div class="col-md-4">
            <div>
                <table class="table table-bordered">
                    <thead>
                      <tr class="bg-olive">
                          @php($cpt++)
                        <th class=" text-center">{{ __('UA '.$cpt.': '.$ua->titre)}}</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($ua->ue as $ue)
                            <tr>
                                <td class="d-flex text-center bg-gradient-white alert-info p-0 m-0">
                                
                                    <form method="POST"  action="{{ route('affiche.ue.cours') }}" class="alert">
                                        @csrf
                                        <input type="text" hidden name="ue_id" value={{ __($ue->id) }}>                                        
                                        <button type="submit" class="alert-link border-0 text-info bg-gradient-white">
                                            {{ __($ue->titre) }}
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
