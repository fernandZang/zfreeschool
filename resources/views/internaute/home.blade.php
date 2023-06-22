@extends('internaute.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
 
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5 border-0">
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
                                    height: 300px;
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
                                    height: 300px;
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
                                    height: 300px;
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
            <div class="col-md-8 float-sm-right">
                
                <div class="col-md-12 login">
                    @include('auth.login') 
                </div>          
                <div class="col-md-12 register">
                    @include('auth.register') 
                </div>
            </div>
        </div>
    </div>




    
    <script>
    	var varr= "";
        $(document).ready(function(){
            
            $(".register").hide();
	      	$(".poste-en").hide();
              $('#poste').change(function(){
                  $test=$(this).val();
                if($test==="Elève"){
                    $(".poste-en").hide();
                    $('.poste-el').show();
                    $('.vrai-btn').show();
                    $('.vrai-btn').click(function(){
                        $(this).hide();
                    });
                }else if($test==="Enseignant"){
                    $(".poste-el").hide();
                    $('.poste-en').show();
                    $('.vrai-btn').show();
                    $('.vrai-btn').click(function(){
                        $(this).hide();
                    });
                }
                //alert($test);
            });
            
            $(".btn-register").click(function(){
                $(".register").show();
                $(".login").hide();  
            });
            $(".btn-login").click(function(){
                $(".register").hide();
                $(".login").show(); 
            });
            
	      	
	    });
    </script>
    @endsection

    