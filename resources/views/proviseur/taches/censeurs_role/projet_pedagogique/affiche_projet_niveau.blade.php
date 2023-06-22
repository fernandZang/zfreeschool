@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="bg-olive card-header text-center row">
                <div class="col-md-10">
                    <b>{{ __('afficher le projet pedagogique de la matiere '.$niv_mat->matiere->nom. ' du niveau '.$niv_mat->niveau->nom)}}</b>
                </div>
                <div class="col-md-2 text-right">
                    <div class="">
                        
                        <form method="POST" action="{{ route('creer.module') }}">
                            @csrf
                            <input type="text" hidden name="projet_pedagogique_id" value={{ __($niv_mat->projet_pedagogique->id) }}>
                            
                            <button type="submit" class="btn btn-primary bg-gradient-info p-1">
                                {{ __('Ajouter Module') }}
                            </button>
                        </form>
                    </div>    
                </div>
            </div>
            <div> 
                @php
                    $mod=1;
                    $uaa=1;
                    $uee=0;
                @endphp
                @foreach ($niv_mat->projet_pedagogique->module as $module)
                    
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr class="bg-olive">
                                <th class="" colspan="20" > 
                                    <div class="row">
                                        <div class="col-md-10 text-center">{{ __('MODULE '.$mod.': '.$module->titre)}}</div>
                                        @php($mod++)
                                        <div class="col text-right">
                                            <div class="">
                                                <form method="POST" action="{{route('creer.ua')}}">
                                                    @csrf
                                                    <input hidden id="module_id" type="number" class="form-control @error('module_id') is-invalid @enderror" name="module_id" value="{{ __($module->id) }}"  autocomplete="module_id" autofocus>
                                                    
                                                    <div class="form-group m-1 p-0">
                                                        <button type="submit" class="btn btn-primary bg-gradient-info p-1">
                                                            {{ __('Ajouter UA') }}
                                                        </button>
                                                    </div>  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gradient-olive text-center">
                                <th class="col-md-1"> titre UA </th>
                                <th class="col-md-2">competence</th>
                                <th class="col-md-9">
                                    <div class="row">
                                        <div class="col"> UE et duree</div>
                                </div>
                                </th>
                            </tr>
                            @foreach ($module->ua as $ua)
                                <tr>
                                    <th class="col-md-1 col bg-gradient-olive">
                                        <div class="row">{{ __('UA '.$uaa.': '.$ua->titre)}}</div>
                                        @php($uaa++)
                                        <div class="row"> 
                                            <div class="">
                                                <form method="POST" action="{{route('creer.ue')}}">
                                                    @csrf
                                                    <input hidden id="ua_id" type="number" class="form-control @error('ua_id') is-invalid @enderror" name="ua_id" value="{{ __($ua->id) }}"  autocomplete="ua_id" autofocus>
                                                    
                                                    <div class="form-group m-1 p-0">
                                                        <button type="submit" class="btn btn-primary bg-gradient-info p-1">
                                                            {{ __('Ajouter UE') }}
                                                        </button>
                                                    </div>  
                                                </form>
                                            </div>
                                        </div>                              
                                    </th>
                                    <th class="col-md-2">competence</th>
                                    <td>
                                        <table class="table table-bordered mt-2">                                    
                                            <tbody>
                                                @foreach ($ua->ue as $ue)
                                                    <tr>
                                                        <td><strong>{{ __('UE '.$uee.':     ')}}</strong>{{ __($ue->titre)}}</td>
                                                        @php($uee++)
                                                        <td>{{ __($ue->duree)}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach       
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
