@extends('adminlte::page')

@section('title','Criar Páginas')

@section('css')
    <link rel="stylesheet" href="style.css">
@endsection

@section('content_header')
    <h1>
        Criar Páginas
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

    <form action="{{route('pages.store')}}" method="post" class="form-horizontal">

        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
         @endif

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Título</label>
            <div class="col-sm-10">
                <input class="form-control @error('title') is-invalid  @enderror" type="text" name="title" value="{{old('title')}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Corpo</label>
            <div class="col-sm-10">
                <textarea name="body" id="body" cols="30" rows="10" class="form-control bodyfield @error('body') is-invalid @enderror">{{old('body')}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success btn-sm" value="Criar">
            </div>
        </div>

    </form>

    </div>
</div>

@endsection

@section('js')

    <!-- Baixa a Api do cdn tiny-->

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>

    <!-- Utililiza cnd incorporando no text area(bodyfield) baixando os plugins(plugins:) e montando menu(toolbar) e adicionando css(content_css)-->

    <script>
        tinymce.init({
            selector:'textarea.bodyfield',
            height:300,
            menubar:false,
            plugins:['link','table','image','autoresize','lists'],
            toolbar:'undo redo | formatselect | bold italic backcolor | alignleft alignright aligncenter alignjustify | table | link image | bullist numlist',
            content_css:[
                '{{asset('assets/css/content.css')}}'
            ],

            //processo para salvar imagens definindo a rota para salvar na pasta routes(api.php) pois estamos utilizando api

            images_upload_url:'{{route('imageupload')}}',
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>
@endsection
