@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between">
                    <div>
                        Nova Tarefa
                    </div>
                    <div>
                        <a href="{{ route('tarefa.index') }}" title="lista de tarefas"><img src="{{asset('img/lista.png')}}" style="width: 26px"></a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('tarefa.store')}}">

                        @csrf

                        <div class="mb-3">
                          <label class="form-label">Tarefa</label>
                          <input type="text" class="form-control" name="tarefa" value="{{old('tarefa')}}">
                        </div>
                        <div class="mb-3" style="color: red;">{{$errors->has('tarefa') ? $errors->first('tarefa') : ''}}</div>

                        <div class="mb-3">
                          <label class="form-label">Data de Conclusão</label>
                          <input type="date" class="form-control" name="data_conclusao" value="{{old('data_conclusao')}}">
                        </div>
                        <div class="mb-3" style="color: red;">{{$errors->has('data_conclusao') ? $errors->first('data_conclusao') : ''}}</div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
