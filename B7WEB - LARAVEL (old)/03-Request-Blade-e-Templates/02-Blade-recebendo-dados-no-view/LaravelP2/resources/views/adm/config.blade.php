<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
</head>
<body>
    <h1>Formulario</h1>

    <form action="" method="post">

        @csrf

        <label>
            Versao : {{$versao}}
        </label><br><br>

        <label>
            Nome:<br>
            <input type="text" name="nome" id="nome" value="{{$nome}}">
        </label><br><br>

        <label>
            E-Mail:<br>
            <input type="text" name="email" id="email" value="{{$email}}">
        </label><br><br>

        <label>
            Cidade:<br>
            <input type="text" name="cidade" id="cidade" value="{{$cidade}}">
        </label><br><br>

        <button>Enviar</button>
    </form>
</body>
</html>