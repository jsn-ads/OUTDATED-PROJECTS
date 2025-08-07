<form action="{{route('pedido_produto.store',['pedido'=>$pedido])}}" method="post">

    @csrf

    <select name="id_produto">

        <option value="">Select Produto</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{old('id_produto') == $produto->id ? 'selected':''}}>{{$produto->nome}}</option>
        @endforeach

    </select>

    <div style="color:red;">{{$errors->has('id_produto') ? $errors->first('id_produto') :''}}</div>

    <button type="submit" class="borda-preta">Adicionar</button>

</form>
