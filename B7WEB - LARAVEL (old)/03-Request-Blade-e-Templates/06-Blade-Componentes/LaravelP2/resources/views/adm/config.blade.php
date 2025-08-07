@extends('layouts/adm')

@section('title', 'Adicionar Usuario')

@section('header','Formulario')

@section('content')
<form action="" method="post">

    @csrf

    <label>
        Versao : {{$versao}}
    </label><br><br>

    
    <x-alert>
        Conteudo
    </x-alert>

    <br><br>

    <label>
        Nome:<br>
        <input type="text" name="nome" id="nome" value="{{$nome}}">
    </label><br><br>

    <label>
        idade:<br>
        <input type="text" name="idade" id="idade" value="{{$idade}}">
    </label><br><br>

    <label>
        E-Mail:<br>
        <input type="text" name="email" id="email" value="{{$email}}">
    </label><br><br>

    <label>
        Cidade:<br>
        <input type="text" name="cidade" id="cidade" value="{{$cidade}}">
    </label><br><br>

    <button>Enviar 3</button>
</form>    
@endsection

@section('footer')
