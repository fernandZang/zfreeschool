@extends('enseignant.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 m-0 p-0">
            <div class="card">
                <div class="col-md-12 card-header text-center text-olive text-bold"><h1>{{ __('zfreeschool') }}</h1></div>
                
                    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
                      <!-- Indicateurs -->
                      <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                      </ul>
              
                      <!-- Carrousel -->
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="3000">
                            <div class="col-md-12">
                                <!-- Background image -->
                                <div
                                  class="bg-image"
                                  style="
                                    background-image: url('{{asset('img/accueil.jpg')}}');
                                    height: 400px;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                  "
                                ></div>
                                <!-- Background image -->
                            </div>
                        </div>
                        <div class="carousel-item" data-interval="3000">
                            <div class="col-md-12">
                                <!-- Background image -->
                                <div
                                  class="bg-image"
                                  style="
                                    background-image: url('{{asset('img/cours-math1.jpg')}}');
                                    height: 400px;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                  "
                                ></div>
                                <!-- Background image -->
                            </div>
                        </div>
                        <div class="carousel-item" data-interval="3000">
                            <div class="col-md-12">
                                <!-- Background image -->
                                <div
                                  class="bg-image"
                                  style="
                                    background-image: url('{{asset('img/cours-info1.png')}}');
                                    height: 400px;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                  "
                                ></div>
                                <!-- Background image -->
                            </div>
                        </div>
                      </div>
                      
                      <!-- Contrôles -->
                      <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                      </a>
                      <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                      </a>
                    </div>
                  
                </div>
            </div>
            
        </div>
    </div>
</div>

    </div>
</div>
@endsection
