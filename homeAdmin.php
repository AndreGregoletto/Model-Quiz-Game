<?php
    include "class/AccessDatabase.php";
    include "AccessPrivateLogin.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Controller</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
    </head>
    <body class="adminQuizBody">
        <div class="mt-5 container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2 mt-5 adminQuizCamp">
                    <ul class="listaAdmin ">
                        <li><a href="AdminPerguntas.php">Perguntas</a></li>
                        <li><a href="AdminRespostas.php">Respostas</a></li>
                        <li><a href="AdminUsuarios.php">Usuários</a></li>
                        <li><a href="Logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7 startedAdmin mt-5">
                    <h2>Seja Bem-Vindo Admin</h2>
                    <span>Escolha uma opção da lista ao lado.</span>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>