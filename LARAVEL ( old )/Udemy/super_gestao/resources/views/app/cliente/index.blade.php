@extends('app.template.basic')

@section('title','Cliente - Listar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cliente - Lista</p>
        </div>

        @component('app.template.parcials.menucliente')

        @endcomponent

        @if ($clientes)

        <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">{{$msg ?? ''}}</div>

                <table border="1px solid" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td><a href="{{ route('cliente.show', $cliente->id)}}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit', $cliente->id)}}">Editar</a></td>
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', $cliente->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$clientes->appends($request)->links('pagination::bootstrap-4')}}
            <br><br>
            Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}} ({{$clientes->firstItem() ?? '0'}} a {{$clientes->lastItem() ?? '0'}})
        </div>

        @else
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">Não Possui clientes</div>
            </div>
        @endif
    </div>
@endsection
