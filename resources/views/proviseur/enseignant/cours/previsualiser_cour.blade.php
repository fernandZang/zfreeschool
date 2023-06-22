@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="bg-olive">
      <h3 class="text-center text-uppercase font-weight-bold" > {{ __($ue->ua->module->projet_pedagogique->niveau_matiere->matiere->nom.' '.$ue->ua->module->projet_pedagogique->niveau_matiere->niveau->nom)}} </h3>
    </div>
    <div class="bg-olive">
      <h4 class="text-center text-lowercase"  > {{ __('Module '.$ue->ua->module->titre)}} </h4>
    </div>
    <div class="bg-olive">
      <h4 class="text-center text-lowercase"  > {{ __('Module '.$ue->ua->titre)}} </h4>
    </div>
    <div class="bg-olive">
      <h4 class="text-center text-lowercase"  > {{ __('Module '.$ue->titre)}} </h4>
    </div>
    <div class="row text-center">
        bonjour       
    </div>
</div>

@endsection
