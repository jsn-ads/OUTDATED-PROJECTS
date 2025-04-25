<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
</head>
<body>

    <div class="form-group">
        <label for="my-input">Peso</label>
        <input id="peso" class="form-control" type="text" name="peso">
    </div>

    <div class="form-group">
        <label for="my-input">Altura</label>
        <input id="altura" class="form-control" type="text" name="altura">
    </div>

    <div class="form-group">
        <label for="my-input">IMC</label>
        <div id="IMC"></div>
    </div>

    <div class="form-group">
        <input id="" type="submit" value="Calcular" onclick="calcularIMC();">
    </div>

    <script src="script.js"></script>
</body>
</html>