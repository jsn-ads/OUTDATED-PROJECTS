@if (isset($cliente->id))
    <form action="{{route('cliente.update',$cliente->id)}}" method="post">
        @method('PUT')
@else
    <form action="{{route('cliente.store')}}" method="post">
@endif
        @csrf

        <input type="text" name="nome" placeholder="Nome" value="{{$cliente->nome ?? old('nome')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('nome') ? $errors->first('nome') : ''}}</div>

        @if (isset($cliente->id))
            <button type="submit" class="borda-preta">Atualizar</button>
        @else
            <button type="submit" class="borda-preta">Cadastrar</button>
        @endif

    </form>
