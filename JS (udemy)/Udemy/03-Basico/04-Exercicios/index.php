<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicios</title>
</head>
<body>

    <div class="form-group">
        <label for="my-input">C</label><br>
        <input id="c1" class="form-control" type="text" name="c1">
    </div><br>

    <div class="form-group">
        <label for="my-input">F</label><br>
        <input id="f1" class="form-control" type="text" name="f1" disabled>
    </div><br>

    <div class="form-group">
        <input id="btn1" type="submit" value="calcular">
    </div>


    <hr>

    <div class="form-group">
        <label for="my-input">Copa do Mundo 1930 a 2018</label>
    </div>

    <div class="form-group">
        <ul id="copa"></ul>
    </div>
    
    <hr>

    <div class="form-group">
        <label for="my-input">N1</label><br>
        <input id="n1" class="form-control" type="text" name="n1">
    </div><br>

    <div class="form-group">
        <label for="my-input">N2</label><br>
        <input id="n2" class="form-control" type="text" name="n2">
    </div><br>

    <div class="form-group">
        <label for="my-input">FALTAS</label><br>
        <input id="ft" class="form-control" type="text" name="ft">
    </div><br>

    <div class="form-group">
        <label for="my-input">Resultado</label><br>
        <div id="re" class="form-control" name="re"></div>
    </div><br>

    <div class="form-group">
        <input id="btn3" type="submit" value="calcular">
    </div>

    <hr>

    <table border="1px" style="width: 400px;">
        <tr>
            <td>aluno</td>
            <td>data</td>
            <td>valor</td>
        </tr>
        <tr>
            <td id="cnome"></td>
            <td id="cdata"></td>
            <td id="cvalor"></td>
        </tr>
        <tr>
            <td colspan="2" id="cvendas"></td>
            <td id="ctotal"></td>
        </tr>   
    </table>

    <script src="script.js"></script>
    <script src="script2.js"></script>
    <script src="script3.js"></script>
    <script src="script4.js"></script>
</body>
</html>