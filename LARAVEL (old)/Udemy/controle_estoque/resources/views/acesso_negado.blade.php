@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between">
                    <div>
                        Acesso Negado
                    </div>
                    <div>
                        <a href="{{ route('tarefa.index') }}" title="lista de tarefas"><img src="{{asset('img/lista.png')}}" style="width: 26px"></a>
                    </div>
                </div>

                <div class="card-body">
                    Desculpe , você não possui permissão para essa operação
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
