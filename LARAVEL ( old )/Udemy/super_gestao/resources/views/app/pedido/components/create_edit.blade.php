@if (isset($pedido->id))
    <form action="{{route('pedido.update',$pedido->id)}}" method="post">
        @method('PUT')
 @else
    <form action="{{route('pedido.store')}}" method="post">
@endif
        @csrf

        <select name="id_cliente" id="">

            <option value="">--- Selecione o Cliente ---</option>

            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}" {{$pedido->cliente ?? old('id_cliente') == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
            @endforeach

        </select>
        <div style="color:red;">{{$errors->has('id_cliente') ? $errors->first('id_cliente') : ''}}</div>

        @if (isset($pedido->id))
            <button type="submit" class="borda-preta">Atualizar</button>
        @else
            <button type="submit" class="borda-preta">Cadastrar</button>
        @endif

    </form>
