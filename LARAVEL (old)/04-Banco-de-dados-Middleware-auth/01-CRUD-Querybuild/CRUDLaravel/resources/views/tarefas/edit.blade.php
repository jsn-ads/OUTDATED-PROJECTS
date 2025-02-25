@extends('layout.layout')

@section('title','Editar tarefa')
    
@section('header','Editar Tarefa')

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
            <input type="text" name="titulo" id="titulo" value="{{$data->titulo}}">
        </label><br><br>

        <button>Salvar</button>
    </form>
@endsection

@section('footer')
    
@endsection