@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="row text-center">
        
        @foreach ($niv_mats as $niv_mat)
        <div class="col-md-4">
            <div>
                <table class="table table-bordered">
                    <thead>
                      <tr class="bg-olive">
                        <th class="text-center" colspan="2" > {{ __($niv_mat->matiere->nom.' '.$niv_mat->niveau->nom)}} </th>
                      </tr>
                      <tr class="bg-olive">
                        <th class=" text-center">Module</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($niv_mat->projet_pedagogique->module as $module)
                            <tr>
                                <td class="d-flex text-center bg-gradient-white alert-info p-0 m-0">
                                
                                    <form method="POST"  action="{{ route('affiche.ua.cours') }}" class="alert">
                                        @csrf
                                        <input type="text" hidden name="module_id" value={{ __($module->id) }}>                                        
                                        <button type="submit" class="alert-link border-0 text-info bg-gradient-white">
                                            {{ __($module->titre) }}
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
