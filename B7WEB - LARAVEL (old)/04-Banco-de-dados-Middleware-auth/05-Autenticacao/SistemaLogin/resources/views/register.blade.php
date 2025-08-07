@extends('layouts.layout')

@section('title','Sistema de Login')
    
@section('header','Cadastro')

@section('content')
    

    @if ($errors->any())
        <x-alert>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form action="" method="post">
        @csrf

        <label>
            <input type="text" name="name" id="name" placeholder="Digite seu Nome" value="{{old('name')}}">
        </label>
             <br><br>
        <label>
            <input type="email" name="email" id="email" placeholder="Digite seu E-mail" value="{{old('email')}}">
        </label>
            <br><br>
        <label>
            <input type="password" name="password" id="password" placeholder="Digite a Senha">
        </label>
            <br><br>
        <label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua Senha">
        </label>
            <br><br>
        <label>
            <input type="submit" value="Cadastrar">
        </label>
    </form>

@endsection

@section('footer')
    
@endsection