@extends('proviseur.layouts.backend-dashboard.app')
@section('title','ZFreeSchool')

@section('content')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<div class="container">
    <div class="bg-olive row font-weight-bold text-center ">
        <div class="col border-right border-red p-2">Prerequis </div>
        <div class="col border-right border-red p-2">Situation probleme </div>
        <div class="col border-right border-red p-2 bg-gradient-green">Trace ecrite </div>
        <div class="col border-right border-red p-2">Devoir </div>
    </div>
    <div class="text-center col-md-12 d-flex justify-content-center">
        <div class='justify-content-center'> 
            <div class="m-2">
                <div class="card-header bg-gradient-olive p-0">{{ __('Contexte') }}</div>
                <div class="col-md-12 p-0 m-0">
                    <div class="row col-md-12 p-0 m-0">
                        <form class="m-0 p-0" method="POST" action="{{route('store.cours.te')}}">
                            @csrf
                            <div class="form-group col-md-12">    
                                <input type="text" hidden name="cour_id" value={{ __($cour->id) }}>                                                    
                                <div class="col-md-12 m-0 p-0">
                                    <textarea class="contexte" name="contexte_sp" autofocus></textarea>                                
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
      height: 395,
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
@endsection
