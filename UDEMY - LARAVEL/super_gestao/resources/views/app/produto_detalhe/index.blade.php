@extends('app.template.basic')

@section('title','produto_detalhe_Detalhe - Listar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Detalhes do Produto - Lista</p>
        </div>

        @component('app.template.parcials.menu_produto_detalhe')

        @endcomponent

        @if ($produto_detalhes)

            <div class="informacao-pagina">
                <div style="width:90%;margin-left: auto;margin-right: auto;">
                    <div style="color: green">{{$msg ?? ''}}</div>

                    <table border="1px solid" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Id produto</th>
                                <th>Largura</th>
                                <th>Altura</th>
                                <th>Comprimento</th>
                                <th>Id_unidade</th>
                                <th>Detalhes</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produto_detalhes as $produto_detalhe)
                                <tr>
                                    <td>{{$produto_detalhe->id_produto}}</td>
                                    <td>{{$produto_detalhe->largura}}</td>
                                    <td>{{$produto_detalhe->altura}}</td>
                                    <td>{{$produto_detalhe->comprimento}}</td>
                                    <td>{{$produto_detalhe->id_unidade}}</td>
                                    <td><a href="#">Visualizar</a></td>
                                    <td><a href="{{route('produto_detalhe.edit',$produto_detalhe->id)}}">Editar</a></td>
                                    <td>
                                        <form id="form_{{$produto_detalhe->id}}" action="{{route('produto_detalhe.destroy', $produto_detalhe->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a>Excluir</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$produto_detalhes->appends($request)->links('pagination::bootstrap-4')}}
                <br><br>
                Exibindo {{$produto_detalhes->count()}} produto_detalhes de {{$produto_detalhes->total()}} ({{$produto_detalhes->firstItem()}} a {{$produto_detalhes->lastItem()}})
            </div>
        @else
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">Não Possui produto_detalhes</div>
            </div>
        @endif
    </div>
@endsection
