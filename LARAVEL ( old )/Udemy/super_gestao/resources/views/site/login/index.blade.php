@extends('site.template.basic')

@section('title','Login')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Bem Vindo</h1>
        </div>

        <div class="informacao-pagina">
            <form action="{{route('login')}}" method="post">

                @csrf

                <div style="width:30%; margin-left: auto; margin-right:auto;">
                    <input type="text" name="usuario" placeholder="Usuario" class="borda-preta" value="{{old('usuario')}}">
                    <div style="color:red;">{{$errors->has('usuario') ? $errors->first('usuario') : ''}}</div>

                    <input type="password" name="senha" placeholder="senha" class="borda-preta">
                    <div style="color: red;">{{$errors->has('senha') ? $errors->first('senha') : ''}}</div>

                    <button class="borda-preta" type="submit">Acessar</button>
                    <div style="color: red;">{{$error}}</div>
                </div>

            </form>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('assets/img/facebook.png') }}">
            <img src="{{ asset('assets/img/linkedin.png') }}">
            <img src="{{ asset('assets/img/youtube.png')  }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('assets/img/mapa.png') }}">
        </div>
    </div>
@endsection
