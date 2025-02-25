@if (isset($produto_detalhe->id))
    <form action="{{route('produto_detalhe.update',$produto_detalhe->id)}}" method="post">
        @method('PUT')
 @else
    <form action="{{route('produto_detalhe.store')}}" method="post">
@endif
        @csrf

        <input type="text" name="produto_id" placeholder="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}</div>

        <input type="text" name="largura" placeholder="largura" value="{{$produto_detalhe->largura ?? old('largura')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('largura') ? $errors->first('largura') :''}}</div>

        <input type="text" name="altura" placeholder="altura" value="{{$produto_detalhe->altura ?? old('altura')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('altura') ? $errors->first('altura') :''}}</div>

        <input type="text" name="comprimento" placeholder="comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('comprimento') ? $errors->first('comprimento') :''}}</div>

        <select name="id_unidade">

            <option value="">Select Unidade</option>

            @foreach ($unidades as $unidade)
                <option value="{{$unidade->id}}" {{($produto_detalhe->id_unidade ?? old('id_unidade')) == $unidade->id ? 'selected':''}}>{{$unidade->unidade}}</option>
            @endforeach
        </select>
        <div style="color:red;">{{$errors->has('id_unidade') ? $errors->first('id_unidade') :''}}</div>

        @if (isset($produto_detalhe->id))
            <button type="submit" class="borda-preta">Atualizar</button>
        @else
            <button type="submit" class="borda-preta">Cadastrar</button>
        @endif

    </form>
