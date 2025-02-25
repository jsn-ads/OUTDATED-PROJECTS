@extends('app.template.basic')

@section('title','Produto - Detalhes')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Detalhes</p>
        </div>

        @component('app.template.parcials.menuproduto')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:40%;margin-left: auto;margin-right: auto;">
                <table border="1px solid" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nome</th><td>{{$produto->nome}}</td>
                        </tr>
                        <tr>
                            <th>Descrição</th><td>{{$produto->descricao}}</td>
                        </tr>
                        <tr>
                            <th>Peso</th><td>{{$produto->peso}}</td>
                        </tr>
                        <tr>
                            <th>unidade</th> <td>{{$produto->id_unidade}}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
