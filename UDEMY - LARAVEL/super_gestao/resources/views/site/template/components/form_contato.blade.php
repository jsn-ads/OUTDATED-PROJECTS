{{$slot}}

<form action="{{ route('contato')}}" method="POST">
    @csrf

    <input name="nome" type="text" placeholder="Nome" class="{{$classe}}" value="{{old('nome')}}">
    {{$errors->has('nome') ? $errors->first('nome') : ''}}
    <br>

    <input name="telefone" placeholder="Telefone" class="{{$classe}}" value="{{old('telefone')}}">
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>

    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}" value="{{old('email')}}">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>

    <select name="id_motivo_contatos" class="{{$classe}}">
       <option value="">Qual o motivo do contado</option>
       @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('id_motivo_contatos') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
       @endforeach
    </select>
    {{$errors->has('id_motivo_contatos') ? $errors->first('id_motivo_contatos') : ''}}
    <br>

    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">
        {{old('mensagem') ? old('mensagem') : null}}
    </textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
