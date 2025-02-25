<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
</head>
<body>
    <h1>config index</h1>

    <form action="" method="post">

        @csrf

        <label>
            Nome:<br>
            <input type="text" name="nome" id="nome">
        </label><br><br>

        <label>
            E-Mail:<br>
            <input type="text" name="email" id="email">
        </label><br><br>

        <label>
            Cidade:<br>
            <input type="text" name="cidade" id="cidade">
        </label><br><br>

        <button>Enviar</button>
    </form>
</body>
</html>