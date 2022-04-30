<?php
    include "class/AccessDatabase.php";
    include "class/Login.class.php";

    $oUserLogin = new Login();

    if (isset($_GET['nickName_user']) && isset($_GET['senha_user']) && !is_null($_GET['nickName_user']) && !is_null($_GET['senha_user'])){
        
        $aUser = $oUserLogin->getLoginCheck($_GET);

        if(count($aUser) > 0){      
              
            session_start();
            $_SESSION['user'] = $aUser[0];
            
            $redirect = $aUser[0]['admin'] == 1 ? 'homeAdmin.php': 'indexQuiz.php';                                
            echo '<meta http-equiv="refresh" content="0;url='.$redirect.'">';  

        }else{
            echo '<script>alert("Usuario ou senha inválidos")</script>';
            echo '<meta http-equiv="refresh" content="0;url=loginPage.php">';
        }
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
        <title>Login</title>
    </head>
    <body class="loginPageBody">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="loginPageCampForm mt-5" method="GET">
                        <h2 class="pt-4">Login</h2>
                        <img src="image/quizLogo.png">
                        
                        <p>Usuário:</p>
                        <input type="text" name="nickName_user" id="nickName_user" placeholder="Nome de Usuário!">
                        
                        <p>Senha:</p>
                        <input type="text" name="senha_user" id="senha_user" placeholder="Senha!">
                        
                        <button type="submit" class="mt-3">Entrar!</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>