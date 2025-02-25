@extends('layouts.layout')

@section('title','Sistema de Login')
    
@section('header','Bem Vindo ao Sistema')
  

@section('content')

    @if($tipo)
        <h1>
            Este campo so e visto pelo Administrador
        </h1>
    @endif
        
    <button>
        <a href="{{url('/login/logout')}}">Sair</a>
    </button>
@endsection

@section('footer')
    
@endsection