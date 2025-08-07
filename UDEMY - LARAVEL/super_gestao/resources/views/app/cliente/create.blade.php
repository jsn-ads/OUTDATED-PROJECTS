@extends('app.template.basic')

@section('title','Cliente - Cadastrar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cliente-Adicionar</p>
        </div>

        @component('app.template.parcials.menucliente')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto;margin-right: auto;">
                @component('app.cliente.components.create_edit')

                @endcomponent
            </div>
        </div>
    </div>
@endsection
