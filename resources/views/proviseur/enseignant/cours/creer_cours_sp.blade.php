@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="bg-olive row font-weight-bold text-center ">
        <div class="col border-right border-red p-2">Prerequis </div>
        <div class="col border-right border-red p-2 bg-gradient-green">Situation probleme </div>
        <div class="col border-right border-red p-2">Trace ecrite </div>
        <div class="col border-right border-red p-2">Devoir </div>
    </div>
    <div class="text-center col-md-12 d-flex justify-content-center">
        <div class='justify-content-center'> 
            <div class="m-2">
                <div class="card-header bg-gradient-olive p-0">{{ __('Contexte') }}</div>
                <div class="col-md-12 p-0 m-0">
                    <div class="row col-md-12 p-0 m-0">
                        <form class="m-0 p-0" method="POST" action="{{route('creer.cours.store')}}">
                            @csrf
                            <div id="nbr"></div>
                            <div class="form-group col-md-11 ml-4">    
                                <input type="text" hidden name="cour_id" value={{ __($cour->id) }}>                                                    
                                <div class="col-md-11 ml-5 mr-0">
                                    <textarea class="contexte" name="contexte_sp" autofocus></textarea>                                
                                </div>
                                <div class="mb-1 mt-1 text-right pr-5 add_sp_question"><a href="#" class="btn btn-info p-1 m-1">ajouter les questions</a></div>
                            </div>
                            <div class="mt-2 row question">
                                <div class="col-md-6 col card-body border p-0 mb-0" >
                                    <div class="card-header bg-olive col m-0 p-0"> {{ __('QRO ') }}</div>
                                    <div class="card-body m-0 p-0 mt-3">
                                        <div id="QRO_contenant">
                                            <div id="QRO_contenant1">
                                            
                                            </div>                                            
                                        </div>
                                        <div class="mb-1 mt-1 text-right pr-5 add_sp_qro" id="QRO_contenant_link"><a href="#QRO_contenant_link" class="btn btn-info p-1 m-1"> ajouter QRO</a></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col card-body border p-0 mb-0">
                                    <div class="card-header bg-olive col m-0 p-0">{{ __('QRU ') }} </div>
                                    <div class="card-body m-0 mt-3 p-0">
                                        <div id="QRU_contenant">
                                            <div id="QRU_contenant1">
                                            
                                            </div>
                                        </div>
                                        <div>
                                            <div class="mb-1 mt-1 text-right pr-5 add_sp_qru" id="QRU_contenant_link">
                                                <a href="#QRU_contenant_link" class="btn btn-info p-1 m-1"> ajouter QRU</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-right mb-0 mt-1 confirmation">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Continuer') }}
                                    </button>
                                </div>
                            </div>    
                        
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>  
    </div>
</div>

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
      selector: 'textarea.contexte',
      width: '100%',
      height: 300,
      autoresize_min_height:400,
      autoresize_max_height:800,
      plugins: [
        'advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save',
        'table emoticons template paste help contextmenu directionality textcolor textpattern'
      ],
      toolbar: 'undo redo insertfile | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help',
      imagetools_cors_hosts: ['mydomain.com', 'otherdomain.com'],
      imagetools_proxy: 'proxy.php',
      menu: {
        favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css',
      relative_urls:false,
      file_picker_types: 'file,video,image,audio,media',
      file_picker_callback: function (cb, value, meta) {

            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
            
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function () {
                
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                
                reader.readAsDataURL(file);
            };
            input.click();
        },
    });
    </script>
    

    <script>
    	var varr= "";
        var i=1;
        var mr=1;
        var qro=1;
        var qru=1;
        function addQts(type,cible){ 
            var contenu=document.getElementById(cible).innerHTML;
            if (type=="QRO") {
                    var qro_next=qro+1;
                contenu=contenu+'<div class="card-body m-0 p-0 mt-3">	<div class="row form-goup">		<div class="col-md-10 bg-gradient-blue ml-5">	<label for="num_qro'+qro+'" class="col-form-label">{{ __("Question N") }}<sup>o</sup>'+i+'</label> 	</div>	<div class="col-md-4 m-1"><input hidden id="num_qro'+i+'" type="text" class="form-control" name="type_qst'+i+'" value="qro" >	</div>	</div>	<div class="row form-goup">		<div class="col-md-4"> <label for="sp_qro'+qro+'" class="col-form-label p-0">{{ __("question ") }}</label> </div>	<div class="col-md-7 m-1"> <input id="qst_numero'+i+'" type="text" class="form-control" name="qst_numero'+i+'"  autocomplete="sp_qro'+qro+'" autofocus>	</div>	</div> <div class="row form-goup">	<div class="col-md-4">	<label for="sp_rep_qro'+qro+'" class="col-form-label p-0">{{ __("elements reponse") }}</label> </div>	<div class="col-md-7 m-1"> <input autofocus id="sp_rep_qro'+qro+'" type="text" class="form-control" name="reponse_numero'+i+'"  autocomplete="sp_rep_qro'+qro+'"></div>	</div>	<div class="row form-goup">	<div class="col-md-4">	<label for="sp_explication_qro'+qro+'" class="col-form-label p-0">{{ __("explication") }}</label> </div> <div class="col-md-7 m-1"><input id="sp_explication_qro'+qro+'" type="text" class="form-control" name="explication'+i+'"  autocomplete="sp_explication_qro'+qro+'"></div>	</div></div>      </div><div class="" id="QRO_contenant'+qro_next+'">';
                    qro++;
            }
            if (type=="VF") {
                contenu=contenu+'<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group">Question '+i+' <span style="color:red">*</span><textarea name="question_'+i+'" class="form-control" placeholder="saisissez la question ici"></textarea></div> <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Vrai: </div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="VRAI" type="radio"></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">Faux: </div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"><input name="reponse_'+i+'" value="FAUX" type="radio"></div></div></div></div><div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"><div class="form-group">Commentaire<textarea  class="form-control" name="com_'+i+'"  placeholder="commenter la question après le choix de la réponse"></textarea></div></div><input type="text" name="typeQst_'+i+'" class="hidden" value="VF"></div></div><br><br>';
                
            }
            if (type=="QRU") {
                var qru_next=qru+1;
                contenu=contenu+'<div class="card-body m-0 p-0 mt-3">  <div class="row form-goup">   <div class="col-md-10 bg-gradient-blue ml-5"><label for="num_qru'+qru+'" class="col-form-label p-0">{{ __("Question N ") }}<sup>o</sup>:'+i+'</label>  </div>	<div class="col-md-4 m-1">	<input hidden id="num_qru'+qru+'" type="text" class="form-control" name="type_qst'+i+'" value="qru"></div>	</div>	<div class="row form-goup">	<div class="col-md-4">	<label for="sp_qru'+qru+'" class="col-form-label p-0">{{ __("question ") }}</label> </div>	<div class="col-md-7 m-1"> <input id="qst_numero'+i+'" type="text" class="form-control" name="qst_numero'+i+'"  autocomplete="sp_qru'+qru+'" autofocus>	</div>	</div>	<div class="row form-goup">	<div class="col-md-4"><label for="sp_rep_qru'+qru+'" class="col-form-label p-0">{{ __("reponse") }}</label>  </div><div class="col-md-7 m-1"><input autofocus id="sp_rep_qru'+qru+'" type="text" class="form-control" name="reponse_numero'+i+'" autocomplete="sp_rep_qru'+qru+'">	</div></div><div class="row form-goup">	<div class="col-md-4"><label for="sp_explication_qru'+qru+'" class="col-form-label p-0">{{ __("explication") }}</label> 	</div>	<div class="col-md-7 m-1"><input id="sp_explication_qru'+qru+'" type="text" class="form-control" name="explication'+i+'"  autocomplete="sp_explication_qru'+qru+'"></div>	</div></div>                <div><div class="" id="QRU_contenant_MR'+qru+'"><div class="" id="QRU_contenant_MR'+qru+mr+'"></div></div>	<div class="mb-1 mt-1 text-right pr-5 add_MR_qru'+qru+'" id="QRU_MR_link"><a href="#QRU_MR_link" class="btn btn-info p-1 m-1"> ajouter mauvaise reponse</a>	</div></div>                    </div><div class="" id="QRU_contenant'+qru_next+'">';
                    qru++;
            }
            
            document.getElementById(cible).innerHTML=contenu;
            i++; 
        }
        
        function addMauvaise_R(type,cible){ 
            var contenu=document.getElementById(cible).innerHTML;
            contenu=contenu+'<div class="col-md-12 row ">	<div class="col-md-4"><label for="MR'+i+'_'+mr+'" class="col-form-label">{{ __("fausse reponse N") }}<sup>o</sup>'+mr+'</label> 	</div>	<div class="col-md-7 ml-1 mr-0"><input  id="MR'+i+'_'+mr+'" type="text" class="form-control" name="mr'+(i-1)+'_'+mr+'" ></div> </div> </div><div class="" id="QRU_contenant_MR'+(qru-1)+(mr+1)+'">';
            
            contenu=contenu+'<input type="text" hidden name="nb_mr'+(i-1)+'"  value="'+mr+'">';
            document.getElementById(cible).innerHTML=contenu;
            mr++; 
        }

        function add_nbqst(cible){ 
            var contenu=document.getElementById(cible).innerHTML;
            contenu=contenu+'<input type="text" hidden name="nbqst" value="'+(i-1)+'">';
            document.getElementById(cible).innerHTML=contenu;
        }

        $(document).ready(function(){
            
	      	$(".question").hide();
	      	$(".confirmation").hide();
            $('.add_sp_question').click(function(){
                $test=$(this).hide();
                $('.question').show();
                $('.confirmation').show();
                
                //alert($test);
            });
            $('.add_sp_qro').click(function(){
                addQts('QRO','QRO_contenant'+qro);
            });
            $('.add_sp_qru').click(function(){
                mr=1;
                addQts('QRU','QRU_contenant'+qru);                
                
                $('.add_MR_qru'+(qru-2)).hide();
                $('.add_sp_qru').hide();        
                $('.add_sp_qro').hide();        
                $(".confirmation").hide();                
                $('.add_MR_qru'+(qru-1)).click(function(){
                    //alert(mr);               
                    addMauvaise_R('QRU','QRU_contenant_MR'+(qru-1)+mr);
                    $('.add_sp_qru').show();
                    $('.add_sp_qro').show();
                    $(".confirmation").show();
                });
            });

            $('.confirmation').click(function(){
                //alert('bien1');
                add_nbqst('nbr');
                //alert('bien2');
            });
        
               
            
	    });
    </script>

    <script type="text/javaScript">
        

       
    </script>
@endsection
