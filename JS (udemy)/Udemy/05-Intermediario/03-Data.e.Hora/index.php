<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e Hora</title>
</head>
<body>
    <div class="form-group">
        <label for="my-input">Saida</label><br>
        <input id="saida" class="form-control" type="date" name="saida">
    </div><br><br>

    <div class="form-group">
        <label for="my-input">Chegada</label><br>
        <input id="chegada" class="form-control" type="date" name="chegada">
    </div><br><br>

    <div class="form-group">
        <input type="submit" value="Calcular" id="btn">
    </div><br><br>

    <div class="form-group" id="resultado">
        
    </div>
    <script src="script.js"></script>
</body>
</html>