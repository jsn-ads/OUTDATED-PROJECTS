@extends('app.template.basic')

@section('title','Produtos do Pedido - Adicionar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Produtos</p>
        </div>

        <div>
            <strong>Pedido : {{$pedido->id}}</strong>
            <br><br>
            <strong>Cliente: {{$pedido->id_cliente}}</strong>
        </div>


        @component('app.template.parcials.menu_pedido_produto')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto;margin-right: auto;">

                @component('app.pedido_produto.components.create',[
                    'pedido' => $pedido,
                    'produtos' => $produtos
                ])
                @endcomponent

                <h4>itens do pedido</h4>

                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de Inclusão</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <form id="form_{{$produto->pivot->id}}" action="{{route('pedido_produto.destroy',['pedidoProduto' => $produto->pivot->id , 'pedido' => $pedido->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
