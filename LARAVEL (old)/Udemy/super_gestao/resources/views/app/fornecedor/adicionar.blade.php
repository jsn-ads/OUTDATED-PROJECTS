@extends('app.template.basic')

@section('title','Fornecedor - Cadastrar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor-Adicionar</p>
        </div>

        @component('app.template.parcials.menuapp')

        @endcomponent

        <div class="informacao-pagina">
            <div style="width:30%;margin-left: auto;margin-right: auto;">
                <form action="{{route('app.fornecedor.add')}}" method="post">

                    @csrf

                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">

                    <input type="text" name="nome" placeholder="Nome" value="{{$fornecedor->nome ?? old('nome')}}" class="borda-preta">
                    <div style="color:red;">{{$errors->has('nome') ? $errors->first('nome') :''}}</div>

                    <input type="text" name="site" placeholder="Site" value="{{$fornecedor->site ?? old('site')}}" class="borda-preta">
                    <div style="color:red;">{{$errors->has('site') ? $errors->first('site') :''}}</div>

                    <input type="text" name="uf" placeholder="UF" value="{{$fornecedor->uf ?? old('uf')}}" class="borda-preta">
                    <div style="color:red;">{{$errors->has('uf') ? $errors->first('uf') :''}}</div>

                    <input type="text" name="email" placeholder="E-mail" value="{{$fornecedor->email ?? old('email')}}" class="borda-preta">
                    <div style="color:red;">{{$errors->has('email') ? $errors->first('email') :''}}</div>

                    <button type="submit" class="borda-preta">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>
@endsection
