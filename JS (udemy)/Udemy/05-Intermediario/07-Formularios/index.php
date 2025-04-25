<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios</title>
</head>
<body>

    <h5>Select Box</h5>

        <select name="options" id="options">
            <option value="opt1">Praia</option>
            <option value="opt2">Montanha</option>
            <option value="opt3">Cidade</option>
        </select>

        <br><br>
        <form action="">
            <input type="checkbox" name="genero" value="masculino"> Masculino <br>
            <input type="checkbox" name="genero" value="Feminino"> Feminino <br>
            <input type="checkbox" name="genero" value="Prefiro não dizer"> Prefiro não dizer <br>
        </form>
        <br><br>

        <button id="mostrar">Mostrar</button>

        <p>Solte aqui a opção selecionada <strong id="resultado"></strong></p>

    <script src="script.js"></script>
</body>
</html>