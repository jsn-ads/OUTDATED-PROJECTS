@extends('app.template.basic')

@section('title','Pedido - Cadastrar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Pedido - Adicionar</p>
        </div>

        @component('app.template.parcials.menupedido')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto;margin-right: auto;">
                @component('app.pedido.components.create_edit',[
                    'clientes' => $clientes
                ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
