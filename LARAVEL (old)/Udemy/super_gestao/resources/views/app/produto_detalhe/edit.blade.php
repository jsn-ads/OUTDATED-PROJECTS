@extends('app.template.basic')

@section('title','Detalhes Produto - Editar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Detahes Produto - Editar</p>
        </div>

        @component('app.template.parcials.menu_produto_detalhe')

        @endcomponent

        <div class="informacao-pagina">

            <div style="width:30%;margin-left: auto;margin-right: auto;">

                <div class="form-group" style="text-align: left">
                <label for="">Nome: {{$produto_detalhe->produto->nome}}</label>
                </div>

                <div class="form-group" style="text-align: left">
                    <label for="">Descrição: {{$produto_detalhe->produto->descricao}}</label>
                </div>

                @component('app.produto_detalhe.components.create_edit',[
                    'produto_detalhe' => $produto_detalhe,
                    'unidades' => $unidades
                ])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
