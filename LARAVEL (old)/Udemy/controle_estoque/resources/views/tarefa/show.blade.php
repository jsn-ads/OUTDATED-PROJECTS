@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$tarefa->tarefa}}</div>

                <div class="card-body">
                    <fieldset disabled>
                        <div class="mb-3">
                            <label class="form-label">Data Limite de conclusao</label>
                            <input class="form-control" type="date" value="{{$tarefa->data_conclusao}}">
                        </div>
                    </fieldset>
                    <a href="{{ route('tarefa.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
