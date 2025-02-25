@extends('adminlte::page')

@section('plugins.Chartjs',true)

@section('title','Painel')

@section('css')
    <link rel="stylesheet" href="style.css">
@endsection

@section('content_header')
    <div class="row">
        <div class="col-sm-9"><h1>Painel de Controle</h1></div>
        <div class="col-sm-3">
            <form action="" method="get">
                <div class="form-group">
                    <select onchange="this.form.submit()" id="my-select" class="form-control" name="interval">
                        <option {{ $datainterval == 30?'selected="selected"':''}} value="30">30 dias</option>
                        <option {{ $datainterval == 60?'selected="selected"':''}} value="60">2 meses</option>
                        <option {{ $datainterval == 90?'selected="selected"':''}} value="90">3 meses</option>
                        <option {{ $datainterval == 120?'selected="selected"':''}} value="120">6 meses</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$visitorsCount}}</h3>
                    <p>Acessos</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$userOnlineCount}}</h3>
                    <p>Usuários Online</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-heart"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$paginasCount}}</h3>
                    <p>Páginas</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-sticky-note" ></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Páginas mais visitadas</h3>
                </div>
                <div class="card-body">
                    <canvas id="pagePie"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.onload = function(){
            let ctx = document.getElementById('pagePie').getContext('2d');
            window.pagePie = new Chart(ctx, {
                type:'pie',
                data:{
                    datasets:[{
                        data:{{$values}},
                        backgroundColor:'#0000FF'
                    }],
                    labels:{!! $labels !!}
                },
                options:{
                    reponsive:true,
                    legend:{
                        display:false
                    }
                }
            });
        }
    </script>
@endsection
