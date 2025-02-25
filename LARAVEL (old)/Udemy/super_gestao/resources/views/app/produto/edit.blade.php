@extends('app.template.basic')

@section('title','Produto - Editar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto-Editar</p>
        </div>

        @component('app.template.parcials.menuproduto')

        @endcomponent


        <div class="informacao-pagina">

            <div style="width:30%;margin-left: auto;margin-right: auto;">
                @component('app.produto.components.create_edit',[
                    'produto' => $produto,
                    'unidades' => $unidades,
                    'fornecedores' => $fornecedores
                ])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
