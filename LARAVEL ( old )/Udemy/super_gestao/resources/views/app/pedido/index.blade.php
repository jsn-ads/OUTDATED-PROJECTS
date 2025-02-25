@extends('app.template.basic')

@section('title','Pedidos - Listar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Pedidos - Lista</p>
        </div>

        @component('app.template.parcials.menupedido')

        @endcomponent

        @if ($pedidos)

        <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">{{$msg ?? ''}}</div>

                <table border="1px solid" style="width: 100%">
                    <thead>
                        <tr>
                            <th>id_cliente</th>
                            <th>Adicionar Produto</th>
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{$pedido->id_cliente}}</td>
                                <td><a href="{{ route('pedido_produto.create',$pedido->id)}}">Adicionar Produto</a></td>
                                <td><a href="{{ route('pedido.show', $pedido->id)}}">Visualizar</a></td>
                                <td><a href="{{ route('pedido.edit', $pedido->id)}}">Editar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" action="{{route('pedido.destroy', $pedido->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$pedidos->appends($request)->links('pagination::bootstrap-4')}}
            <br><br>
            Exibindo {{$pedidos->count()}} Produtos de {{$pedidos->total()}} ({{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
        </div>

        @else
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">Não Possui Produtos</div>
            </div>
        @endif
    </div>
@endsection
