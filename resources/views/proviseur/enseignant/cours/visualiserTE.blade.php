@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container situation_probleme">
    <div class="bg-olive row font-weight-bold text-center ">
        <div class="col border-right">
            <a href="{{route('affiche.cours.pre')}}" class="text-white p-5">
                Prerequis 
            </a>
        </div>
        <div class="col border-right">
            <a href="{{route('affiche.cours.sp')}}" class="text-white p-5">
                Situation probleme
            </a>
        </div>
        <div class="col border-right bg-gradient-green">
            <a href="{{ route('affiche.cours.TE')}}" class="text-white p-5">
                Trace ecrite 
            </a>
        </div>
        <div class="col border-right">
            <a href="{{route('affiche.cours.Devoir')}}" class="text-white p-5">
                Devoir 
            </a>
        </div>
    </div>
    <form action="#" method="post">
        <div class="text-center col-md-12 justify-content-center row mt-5 ">
            <div class="col-md-10 border border-info mr-2 mt-1">
                {!!__($cour->trace_ecrite)!!}
            </div>
        </div>
    </form>
    <div class="col-md-12 row text-md-left justify-content-center mb-0 mt-1 {{__('suivant')}}">
        <div class="col-md-6 offset-md-4 mb-4">
            <a href="{{route('affiche.cours.Devoir')}}" class="btn btn-primary">
                {{ __('devoir') }}
            </a>
        </div>
    </div>              
</div>
@endsection