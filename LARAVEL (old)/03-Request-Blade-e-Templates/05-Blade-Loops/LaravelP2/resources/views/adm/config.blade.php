@extends('layouts/adm')

@section('title', 'Adicionar Usuario')

@section('header','Formulario')

@section('content')
<form action="" method="post">

    @csrf

    @forelse ($usuarios as $usuario)
        <li>{{$usuario}}</li>
    @empty
        não possui dados
    @endforelse

    <label>
        Versao : {{$versao}}
    </label><br><br>

    <label>
        Nome:<br>
        <input type="text" name="nome" id="nome">
    </label><br><br>

    <label>
        idade:<br>
        <input type="text" name="idade" id="idade">
    </label><br><br>

    <label>
        E-Mail:<br>
        <input type="text" name="email" id="email">
    </label><br><br>

    <label>
        Cidade:<br>
        <input type="text" name="cidade" id="cidade">
    </label><br><br>

    <button>Enviar 3</button>
</form>    
@endsection

@section('footer')
