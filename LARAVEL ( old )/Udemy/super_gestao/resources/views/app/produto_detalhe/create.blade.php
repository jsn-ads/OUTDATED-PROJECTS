@extends('app.template.basic')

@section('title','Produto - Cadastrar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Detalhes do Produto - Adicionar</p>
        </div>

        @component('app.template.parcials.menu_produto_detalhe')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto;margin-right: auto;">
                @component('app.produto_detalhe.components.create_edit',[
                    'unidades'=>$unidades
                ])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
