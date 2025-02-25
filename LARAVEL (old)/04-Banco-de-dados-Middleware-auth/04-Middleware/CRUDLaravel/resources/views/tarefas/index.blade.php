@extends('layout.layout')

@section('title','tarefas')
    
@section('header','Lista de Tarefas')

@section('content')

    @if (count($tarefas) > 0)

        <button><a href="{{ route('tarefas.add')}}">Adicionar</a></button>

        <br><br>

        <table border="1px" width="100%">

            <tr>
                <th>Tarefa</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>

            @foreach ($tarefas as $tarefa)
            <tr>  
                <td>{{$tarefa->titulo}}</td>
                <td> 
                    <button><a href="{{ route('tarefas.status', ['id'=>$tarefa->id]) }}">{{($tarefa->status === 0)?'Marcar':'Desmarcar'}}</a></button>
                </td>
                <td>
                    <button><a href="{{ route('tarefas.edit', ['id'=>$tarefa->id]) }}">Editar</a></button>
                    <button><a href="{{ route('tarefas.del', ['id'=>$tarefa->id]) }}" onclick=" return confirm('Tem certeza que deseja excluir')">Excluir</a></button>
                </td>
            <tr>  
            @endforeach
        </table>
    @else
        Não possui dados
    @endif
    
@endsection

@section('footer')
    
@endsection