@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between">
                    <div>
                        Tarefas
                    </div>
                    <div>
                        <a href="{{route('tarefa.pdf')}}" target="_blank" title="baixar em pdf" class="btn btn-sm btn-outline-danger" style="width: 60px;">pdf</a>
                        {{-- <a href="{{route('tarefa.exportar',['extensao' => 'pdf'])}}" title="baixar em pdf" class="btn btn-sm btn-outline-danger" style="width: 60px;">pdf</a> --}}
                        {{-- <a href="{{route('tarefa.exportar',['extensao' => 'csv'])}}" title="baixar em excel" class="btn btn-sm btn-outline-success" style="width: 60px;">csv</a> --}}
                        <a href="{{route('tarefa.exportar',['extensao' => 'xlsx'])}}" title="baixar em excel" class="btn btn-sm btn-outline-success" style="width: 60px;">xlxs</a>
                        <a href="{{route('tarefa.create')}}" title="adicionar tarefa" class="btn btn-sm btn-outline-secondary" style="width: 30px;"> + </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col" colspan='3'>Data Conclusão</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $key => $tarefa)
                                <tr>
                                    <th scope="row">{{$tarefa->id}}</th>
                                    <td>{{$tarefa->tarefa}}</td>
                                    <td>{{date('d/m/Y' , strtotime($tarefa->data_conclusao))}}</td>
                                    <td style="width: 50px"><a href="{{ route('tarefa.edit' ,  $tarefa->id) }}" title="editar tarefa" class="btn btn-sm btn-outline-success">Editar</a></td>
                                    <td>
                                        <form action="{{route('tarefa.destroy', $tarefa->id)}}" method="post" id="{{$tarefa->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" onclick="document.getElementbyId('{{$tarefa->id}}').submit()">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">anterior</a></li>
                          @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                            <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : ''}}">
                                <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                            </li>
                          @endfor
                          <li class="page-item"><a class="page-link" href=""{{ $tarefas->nextPageUrl() }}">proximo</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
