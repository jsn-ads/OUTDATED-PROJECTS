@extends('layouts.layout')

@section('title','Sistema de Login')
    
@section('header','Login')

@section('content')
    

    @if (session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    <form action="" method="post">
        @csrf

        <label>
            <input type="email" name="email" id="email" placeholder="Digite um E-mail">
        </label>
            <br><br>
        <label>
            <input type="password" name="password" id="password" placeholder="Digite a Senha">
        </label>
            <br><br>
        <label>
            <input type="submit" value="Entrar">
            nao possui cadastro ? <a href="{{url('register')}}">clique aqui</a>
        </label>
    </form>


@endsection

@section('footer')
    
@endsection