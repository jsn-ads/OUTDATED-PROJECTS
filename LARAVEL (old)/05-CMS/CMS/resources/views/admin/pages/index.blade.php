@extends('adminlte::page')

@section('title','Páginas')

@section('css')
    <link rel="stylesheet" href="style.css">
@endsection

@section('content_header')
    <h1>
        Páginas
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <h5 class="card-title">
            <a href="{{route('pages.create')}}" class="btn btn-sm btn-success">Adicionar</a>
        </h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td width='50px'>{{$page->id}}</td>
                    <td>{{$page->title}}</td>
                    <td width='250px'>
                        <a href="" target="_blank" class="btn btn-sm btn-warning">Visualizar</a>
                        <a href="{{route('pages.edit',['page'=>$page->id])}}" class="btn btn-sm btn-primary">Editar</a>
                        <form class="d-inline" action="{{route('pages.destroy',['page'=>$page->id])}}" method="post" onsubmit="return confirm('Deseja deletar {{$page->title}}?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

{{ $pages->links('pagination::bootstrap-4') }}

@endsection

@section('js')
    <script src=""></script>
@endsection

