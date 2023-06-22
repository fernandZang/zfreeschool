@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container prerequis">
    <div class="bg-olive row font-weight-bold text-center ">
        <div class="col border-right bg-gradient-green">
            <a href="{{route('affiche.cours.pre')}}" class="text-white p-5">
                Prerequis 
            </a>
        </div>
        <div class="col border-right">
            <a href="{{route('affiche.cours.sp')}}" class="text-white p-5">
                Situation probleme
            </a>
        </div>
        <div class="col border-right">
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
            <div class="col-md-8 border border-info mr-2 mt-1">
                {!!__($cour->prerequi->contexte)!!}
            </div>  
            <div class="col-md-9 row mt-4">
                @php ($nbqst=1)
                @foreach ($cour->prerequi->question->sortBy('numero_qst') as $question)
                    <div class="{{__('qst').$nbqst}} col-md-12">
                        <div class="col-md-1">
                        {{__($question->numero_qst)}}
                        </div>
                        <div class="border-top border-info col-md-11 mt-2">
                            <div class="row">
                                <div class="ml-3 col-md-10">{{__($question->question)}}</div> 
                            </div>  
                            @php ($i=1) 
                            @if($question->type_question=='qru')                 
                                <div class="mt-4">choisir la reponse qui convient</div>
                                @php ($i=0)
                                @foreach ($question->mauvaise_reponse as $fr)
                                    @php ($i++)                 
                                    <div class="row {{__('vr'.$nbqst.$i)}} border rounded p-1 m-1 border-info {{__('vr'.$nbqst)}}">
                                        <div class="ml-3 col-md-12">{{__($question->reponse)}}</div> 
                                    </div>  
                                    <div class="row border rounded p-1 m-1 border-info {{__('fr'.$nbqst)}}">
                                        <div class="ml-3 col-md-12 ">{{__($fr->reponse_f)}} </div> 
                                    </div> 
                                @endforeach 
                                @php ($i++)
                                <div class="row {{__('vr'.$nbqst.$i)}} border rounded p-1 m-1 border-info {{__('vr'.$nbqst)}}">
                                    <div class="ml-3 col-md-12">{{__($question->reponse)}}</div> 
                                </div> 
                                <input type="number" hidden class="{{__('nb_fr'.$nbqst)}}" value="{{__($i)}}">                  
                            @elseif ($question->type_question=='qro')                 
                                
                                <div class="col-md-12 row">
                                    <div class="col-md-5">
                                        <label for="reponse"> votre reponse</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="reponse" class="{{__('prop'.$nbqst)}}" >
                                    </div>
                                </div>
                                <div hidden class="row border rounded p-1 m-1 border-info">
                                    <input type="text" class="{{__('vr'.$nbqst)}}" value="{{__($question->reponse)}}"> 
                                </div>
                                <div class="col-md-12 row text-md-right justify-content-center mb-0 mt-1 {{__('valider'.$nbqst)}} mb-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-primary">
                                            {{ __('Valider') }}
                                        </button>
                                    </div>
                                </div>
                            @endif                
                            <div class="row bg-warning {{__('ex'.$nbqst)}} m-1 p-1 rounded">
                                <input hidden type="text" class="{{__('type_qst'.$nbqst)}}" value="{{__($question->type_question)}}">                  
                                <div class="ml-3 col-md-12">{{__($question->explication)}}</div> 
                            </div>      
                        </div>
                    </div>
                    @php ($nbqst++)
                    @endforeach
                    <div class="col-md-12 row text-md-right justify-content-center mb-0 mt-1 {{__('confirmation')}}">
                        <div class="col-md-6 offset-md-4 mb-4">
                            <button type="button" class="btn btn-primary">
                                {{ __('Continuer') }}
                            </button>
                        </div>
                    </div>              
                <input type="number" hidden class="{{__('nb_qst')}}" value="{{__($nbqst-1)}}">
            </div>
        </div>
    </form>
    <div class="col-md-6 offset-md-4 mb-5 {{__('suivant')}}">
        <a href="{{route('affiche.cours.sp')}}" class="btn btn-primary mb-5">
            {{ __('situation probleme') }}
        </a>
    </div>
</div>
<script>
    function aleatoire(N){ 
        return(Math.floor((N)*Math.random()+1));
    }

    $(document).ready(function(){
        
        var i=2;
        var nb_qst=$('.nb_qst').val();
        var pos=0;
        var nbfr=0;
        var qst=0;
        var type_qst='';
        
        $('.suivant').hide();
        for(j=1;j<=nb_qst;j++){
            $('.ex'+j).hide();
            
            //cacher toute les questions
            $('.qst'+j).hide(); 
            //alert(j);
            nbfr=$('.nb_fr'+j).val();
            pos= aleatoire(nbfr);
            pos= aleatoire(nbfr);
            for(i=1;i<=nbfr;i++){
                if(i!=pos){
                    $('.vr'+j+i).hide();
                }
                $('.vr'+j+i).css("background-color","teal");
                $('.fr'+j).css("background-color","teal");
            }
            nbfr=0;
            //alert('test');
            //alert(nbfr);
        }
        
        $('.confirmation').click(function(){
            qst++;
            $('.confirmation').hide(); 
            for(j=1;j<=nb_qst;j++){            
                type_qst=$('.type_qst'+j).val();
                $('.qst'+j).hide();                
                if(qst==j){
                    $('.qst'+j).show();
                    if(type_qst=='qru'){
                        $('.fr'+j).click(function(){
                            $('.ex'+qst).show();
                            $('.fr'+qst).hide();
                            $('.confirmation').show(); 
                            $(this).show();
                            $(this).css("background-color","crimson");
                            $('.vr'+qst).css("background-color","lime");
                            //alert(qst);
                            //alert('mauvaise reponse');
                            $('.confirmation'+qst).show(); 
                        });
                        $('.vr'+j).click(function(){
                            $('.fr'+qst).hide();
                            $('.ex'+qst).show();
                            $('.confirmation').show(); 
                            $(this).css("background-color","lime");
                            alert('bonne reponse'); 
                            $('.confirmation'+qst).show(); 
                        }); 
                    };
                    if(type_qst=='qro'){
                        //$('.vr'+qst).css("background-color","lime");
                        var ch=$('.vr'+qst).val();
                        $('.valider'+qst).click(function(){
                            var prop=new RegExp($('.prop'+qst).val().trim(),'i');
                            var verif=ch.search(prop);  
                            if (verif!=-1 && $('.prop'+qst).val().trim()!=''&& $('.prop'+qst).val().trim().length>2){
                                $('.ex'+qst).show();
                                $('.confirmation').show();  
                                alert('bonne reponse'); 
                                $(this).hide();                   
                            }
                            else if($('.prop'+qst).val().trim()==''|| $('.prop'+qst).val().trim().length<=2){
                                alert('entrez une reponse');
                            }
                            else{
                                $('.ex'+qst).show();
                                $('.confirmation').show();  
                                alert('mauvaise reponse!!!!!!!!!!!!!!!!!!!'); 
                                $(this).hide();                                                                
                            }                          
                        })
                    }
                } 
            }
            if(qst>nb_qst){
                alert('terminee');
                $('.suivant').show();
            }           
            
        }); 
    });
</script>



@endsection