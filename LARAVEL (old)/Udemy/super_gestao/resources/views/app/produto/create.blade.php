@extends('app.template.basic')

@section('title','Produto - Cadastrar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto-Adicionar</p>
        </div>

        @component('app.template.parcials.menuproduto')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto;margin-right: auto;">
                @component('app.produto.components.create_edit',[
                    'unidades'=>$unidades,
                    'fornecedores'=>$fornecedores
                ])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
