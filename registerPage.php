<?php
    include "class/AccessDatabase.php";
    include "class/Register.class.php";

    $oRegister = new Register();

    if(isset($_GET['nome_user']) && !empty($_GET['nome_user'])){
        $oRegister->saveRegister($_GET);
        echo '<script>alert("Cadastro realizado!")</script>';
        echo '<meta http-equiv="refresh" content="0;url=homePage.php">';
    }    
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
        <title>Registrar</title>
    </head>
    <body class="RegisterPageBody">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="RegisterPageCampForm mt-5" method="GET">
                        <h2 class="pt-4">Cadastrar:</h2>
                        
                        <p>Nome:</p>
                        <input type="text" name="nome_user" id="nome_user" placeholder="Seu Nome aqui!">
                        
                        <p>Sobrenome:</p>
                        <input type="text" name="sobrenome_user" id="sobrenome_user" placeholder="Seu Sobrenome aqui!">
                        
                        <p>E-mail:</p>
                        <input type="text" name="email_user" id="email_user" placeholder="Seu E-mail aqui!">
                        
                        <p>Nome de Usuário:</p>
                        <input type="text" name="nickName_user" id="nickName_user" placeholder="Seu nome de Usuário aqui!">
                        
                        <p>Crie sua Senha:</p>
                        <input type="text" name="senha_user" id="senha_user" placeholder="Sua Senha aqui!">
                        
                        <button type="submit" class="mt-3">Cadastrar!</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>