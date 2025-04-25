<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercicios</title>
</head>
<body>


<hr>
<select name="casa" id="casa">
    <option value="escritorio">escritorio</option>
    <option value="cozinha">cozinha</option>
    <option value="quarto">quarto</option>
    <option value="sala">sala</option>
    <option value="area">area</option>
</select>
<hr>
<select name="entrega" id="entrega">
    <option value="">Selecione a Entrega</option>
    <option value="8">Express</option>
    <option value="15">Carta Registrada</option>
</select>

<button id="btn" disabled>Entrega</button>

<span id="saida"></span>
<span id="chegada"></span>

<br>

<hr>

<ul id="veiculo">

</ul>

<button id="btnCalcularPedagio">calcular pedagio</button>

<div id="valorDoPedagio">

</div>



<script src="script.js"></script>
<script src="script2.js"></script>
<script src="script3.js"></script>
</body>
</html>