@extends('adminlte::page')

@section('title','Usuários')

@section('css')
    <link rel="stylesheet" href="style.css">
@endsection

@section('content_header')
    <h1>
        Usuários
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <h5 class="card-title">
            <a href="{{route('users.create')}}" class="btn btn-sm btn-success">Adicionar</a>
        </h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-Mail</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                @if ($loggedId != $user->id)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form class="d-inline" action="{{route('users.destroy',['user'=>$user->id])}}" method="post" onsubmit="return confirm('Deseja deletar {{$user->name}}?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>

    </div>
</div>

{{ $users->links('pagination::bootstrap-4') }}

@endsection

@section('js')
    <script src=""></script>
@endsection

