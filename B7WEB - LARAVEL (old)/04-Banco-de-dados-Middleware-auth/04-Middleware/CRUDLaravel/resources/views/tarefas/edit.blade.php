@extends('layout.layout')

@section('title','Editar tarefa')
    
@section('header','Editar Tarefa')

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
            <input type="text" name="titulo" id="titulo" value="{{$data->titulo}}">
        </label><br><br>

        <button>Salvar</button>
    </form>
@endsection

@section('footer')
    
@endsection