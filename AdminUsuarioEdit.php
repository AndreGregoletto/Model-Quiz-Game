<?php
    include "class/AccessDatabase.php";
    include "class/Register.class.php";
    include "AccessPrivateLogin.php";

    $oAdminUser = new Register();
    
    $aUserEdits = $oAdminUser->GetIdUser($_GET['id_user']);

    if($_GET['acao'] == 'alterar' && !is_null($_GET['acao'])){
        $oAdminUser->AdminUserEdit($_GET);
        echo '<meta http-equiv="refresh" content="0;url=AdminUsuarios.php">';
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Perguntas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
    </head>
    <body class="bodyAdminQuestEdit">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 AdminCamp mt-5">
                    <form class="AdminEditForm AdminUserForm" method="GET">
                        <input type="text" name="id_user" id="id_user" value="<?php echo $aUserEdits[0]['id_user'] ?>" hidden>
                       
                        <p>Nome</p>
                        <input type="text" name="nome_user" id="nome_user" value="<?php echo $aUserEdits[0]['nome_user'] ?>">
                                               
                        <p>Sobrenome</p>
                        <input type="text" name="sobrenome_user" id="sobrenome_user" value="<?php echo $aUserEdits[0]['sobrenome_user'] ?>">
                                               
                        <p>E-mail</p>
                        <input type="text" name="email_user" id="email_user" value="<?php echo $aUserEdits[0]['email_user'] ?>">
                                               
                        <p>NickName</p>
                        <input type="text" name="nickName_user" id="nickName_user" value="<?php echo $aUserEdits[0]['nickName_user'] ?>">
                                               
                        <p>Senha</p>
                        <input type="text" name="senha_user" id="senha_user" value="<?php echo $aUserEdits[0]['senha_user'] ?>">
                        
                        <p>Tipo</p>
                        <select value="<?php echo $aUserEdits[0]['admin'] ?>" name="admin" id="admin">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select> 
                        
                        <input type="hidden" name="acao" value="alterar"> 
                        
                        <button class="mt-3" type="submit">Editar</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>   
    </body>
</html>