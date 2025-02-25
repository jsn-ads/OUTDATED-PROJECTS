@if (isset($produto->id))
    <form action="{{route('produto.update',$produto->id)}}" method="post">
        @method('PUT')
 @else
    <form action="{{route('produto.store')}}" method="post">
@endif
        @csrf

        <select name="id_fornecedor">

            <option value="">Select Fornecedor</option>

            @foreach ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" {{ ($produto->id_fornecedor ?? old('id_fornecedor')) == $fornecedor->id ? 'selected':''}}>{{$fornecedor->nome}}</option>
            @endforeach

        </select>
        <div style="color:red;">{{$errors->has('id_fornecedor') ? $errors->first('id_fornecedor') :''}}</div>

        <input type="text" name="nome" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('nome') ? $errors->first('nome') : ''}}</div>

        <input type="text" name="descricao" placeholder="Descrição" value="{{$produto->descricao ?? old('descricao')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('descricao') ? $errors->first('descricao') :''}}</div>

        <input type="number" name="peso" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}" class="borda-preta">
        <div style="color:red;">{{$errors->has('peso') ? $errors->first('peso') :''}}</div>

        <select name="id_unidade">
            <option value="">Select Unidade</option>

            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ($produto->id_unidade ?? old('id_unidade')) == $unidade->id ? 'selected':''}}>{{$unidade->unidade}}</option>
            @endforeach

        </select>
        <div style="color:red;">{{$errors->has('id_unidade') ? $errors->first('id_unidade') :''}}</div>

        @if (isset($produto->id))
            <button type="submit" class="borda-preta">Atualizar</button>
        @else
            <button type="submit" class="borda-preta">Cadastrar</button>
        @endif

    </form>
