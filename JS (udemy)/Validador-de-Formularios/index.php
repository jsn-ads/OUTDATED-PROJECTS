<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Formularios</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="screen">
        
        <div class="leftside">
            <img src="assets/img/php.png" alt="">
        </div>

        <div class="rightside">
            <h1>Crie uma conta</h1>

            <form action="cadatro.php" method="POST" class="formValidator">
                <label>
                    Seu nome:<br>
                    <input type="text" name="name" data-rules="required|min=2">
                </label>
                <label>
                    Seu E-mail:<br>
                    <input type="email" name="email">
                </label>
                <label>
                    Sua Senha:<br>
                    <input type="password" name="password">
                </label>
                <label>
                    <input type="submit" value="Cadastrar">
                </label>

                <label>
                    Já tem uma conta?<a href=""> Faça o Login</a>
                </label>
            </form>
        </div>

    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>