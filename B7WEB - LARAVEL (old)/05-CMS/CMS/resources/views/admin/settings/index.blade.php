@extends('adminlte::page')

@section('title','Configurações')

@section('css')
    <link rel="stylesheet" href="style.css">
@endsection

@section('content_header')
    <h1>Configurações</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

           <form action="{{route('settings.save')}}" method="post">

                @method('PUT')

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

                @if (session('warning'))
                    <div class="alert alert-default-info">
                        {{session('warning')}}
                    </div>
                @endif

                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Titulo</label>
                    <input id="title" class="form-control col-sm-10" type="text" name="title" value="{{$settings['title']}}">
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Sub-Titulo</label>
                    <input id="subtitle" class="form-control col-sm-10" type="text" name="subtitle" value="{{$settings['subtitle']}}">
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-2">E-Mail</label>
                    <input id="email" class="form-control col-sm-10" type="email" name="email" value="{{$settings['email']}}">
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Cor de Fundo</label>
                    <input id="bgcolor" class="form-control col-sm-1" type="color" name="bgcolor" value="{{$settings['bgcolor']}}">
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Cor de Texto</label>
                    <input id="textcolor" class="form-control col-sm-1" type="color" name="textcolor" value="{{$settings['textcolor']}}">
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-2"></label>
                    <input class="btn btn-sm btn-success" type="submit" value="Salvar">
                </div>

            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src=""></script>
@endsection
