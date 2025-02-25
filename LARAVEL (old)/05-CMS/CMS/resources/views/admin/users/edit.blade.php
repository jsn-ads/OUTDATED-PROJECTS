@extends('adminlte::page')

@section('title','Editar Usuário')

@section('css')
    <link rel="stylesheet" href="style.css">
@endsection

@section('content_header')
    <h1>
        Editar Usuário
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

    <form action="{{route('users.update',['user'=>$user->id])}}" method="post" class="form-horizontal">
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

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nome Completo</label>
            <div class="col-sm-10">
                <input class="form-control @error('name') is-invalid  @enderror" type="text" name="name" value="{{$user->name}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">E-Mail</label>
            <div class="col-sm-10">
                <input class="form-control @error('email') is-invalid  @enderror" type="email" name="email" value="{{$user->email}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nova Senha</label>
            <div class="col-sm-6">
                <input class="form-control @error('password') is-invalid  @enderror" type="password" name="password">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Confirma Senha</label>
            <div class="col-sm-6">
                <input class="form-control @error('password') is-invalid  @enderror" type="password" name="password_confirmation">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary btn-sm" value="Atualizar">
            </div>
        </div>

    </form>

    </div>
</div>

@endsection

@section('js')
    <script src=""></script>
@endsection
