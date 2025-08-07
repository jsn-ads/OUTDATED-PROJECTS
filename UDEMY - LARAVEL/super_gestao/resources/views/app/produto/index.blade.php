@extends('app.template.basic')

@section('title','Produto - Listar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Lista</p>
        </div>

        @component('app.template.parcials.menuproduto')

        @endcomponent

        @if ($produtos)

        <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">{{$msg ?? ''}}</div>

                <table border="1px solid" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th>Comprimento</th>
                            <th>Fornecedor</th>
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->id_unidade}}</td>
                                <td>{{$produto->produtoDetalhe->largura ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->altura ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->comprimento ?? ''}}</td>
                                <td>{{$produto->fornecedor->nome}}</td>
                                <td><a href="{{ route('produto.show', $produto->id)}}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit', $produto->id)}}">Editar</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{route('produto.destroy', $produto->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                            @foreach ($produto->pedidos as $pedido)
                                <tr>
                                    <td colspan="11">
                                        <a href="{{route('pedido_produto.create',['pedido'=>$pedido->id])}}">pedido: {{$pedido->id}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$produtos->appends($request)->links('pagination::bootstrap-4')}}
            <br><br>
            Exibindo {{$produtos->count()}} Produtos de {{$produtos->total()}} ({{$produtos->firstItem()}} a {{$produtos->lastItem()}})
        </div>

        @else
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">Não Possui Produtos</div>
            </div>
        @endif
    </div>
@endsection
