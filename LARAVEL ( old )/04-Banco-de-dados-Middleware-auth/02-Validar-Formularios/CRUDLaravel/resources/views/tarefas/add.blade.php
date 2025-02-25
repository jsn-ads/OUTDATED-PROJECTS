@extends('layout.layout')

@section('title','adicionar tarefa')
    
@section('header','Adicionar Tarefa')

@section('content')
    <form method="post">
        @csrf

        @if ($errors->any())
          <x-alert>
                @foreach ($errors->all() as $error)
                    {{$error}}<br/>
                @endforeach
          </x-alert>
        @endif

        <label>
            Tarefa: <br>
            <input type="text" name="titulo" id="titulo">
        </label><br><br>

        <button>Adicionar</button>
    </form>
@endsection

@section('footer')
    
@endsection