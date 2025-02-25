<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PDF</title>
</head>

<style>
    .page-break{
        page-break-after: always;
    }
</style>

<body>
    <h1>Lista de Tarefas</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tarefa</th>
            <th scope="col">Data Conclusão</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{$tarefa->id}}</td>
                    <td>{{$tarefa->tarefa}}</td>
                    <td>{{date('d-m-y', strtotime($tarefa->data_conclusao))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- quebra de pagina  --}}
    <div class="page-break"></div>

    <h1>Pagina 2</h1>

</body>
</html>

