@extends('app.template.basic')

@section('title','Fornecedor - Listar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Lista</p>
        </div>

        @component('app.template.parcials.menuapp')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:90%;margin-left: auto;margin-right: auto;">
                <div style="color: green">{{$msg ?? ''}}</div>
                <table border="1px solid" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{$fornecedor->nome}}</td>
                                <td>{{$fornecedor->site}}</td>
                                <td>{{$fornecedor->uf}}</td>
                                <td>{{$fornecedor->email}}</td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}" onclick=" return confirm('deseja deletar esse registro')">Excluir</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de produtos</p>
                                    <table border="1" style="margin: 30px;width: 95%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Descrição</th>
                                                <th>Peso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produto as $key => $produto)
                                            <tr>
                                                <td>{{$produto->id}}</td>
                                                <td>{{$produto->nome}}</td>
                                                <td>{{$produto->descricao}}</td>
                                                <td>{{$produto->peso}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$fornecedores->appends($request)->links('pagination::bootstrap-4')}}
            <br><br>
            Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}} ({{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}})
        </div>
    </div>
@endsection
