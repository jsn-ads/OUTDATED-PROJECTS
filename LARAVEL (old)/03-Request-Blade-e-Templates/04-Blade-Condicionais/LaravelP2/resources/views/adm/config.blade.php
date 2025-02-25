@extends('layouts/adm')

@section('title', 'Adicionar Usuario')

@section('header','Formulario')

@section('content')
<form action="" method="post">

    @csrf


    @if ($idade > 18 && $idade < 60)
        Adulto
    @elseif($idade > 60)
        Idoso
    @else
        Menor de Idade
    @endif

    <br>

    @isset($nome)
        nome esta preenchido
    @endisset

    <br>

    <label>
        Versao : {{$versao}}
    </label><br><br>

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
