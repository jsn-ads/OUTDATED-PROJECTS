@extends('layout.layout')

@section('title','adicionar tarefa')
    
@section('header','Adicionar Tarefa')

@section('content')
    <form method="post">
        @csrf

        @if (session('warning'))
          <x-alert>
                {{session('warning')}}
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