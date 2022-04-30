<?php
    include "class/AccessDatabase.php";
    include "class/Register.class.php";
    include "AccessPrivateLogin.php";

    $oRegister = new Register();

    if(isset($_GET['nome_user']) && !empty($_GET['nome_user'])){
        $oRegister->saveRegister($_GET);
        echo '<script>alert("Cadastro realizado!")</script>';
        echo '<meta http-equiv="refresh" content="0;url=AdminUsuarios.php">';
    }else{
        if(isset($_GET['id_user']) && !empty($_GET['id_user'])){
            $oRegister->AdminUserDellet($_GET['id_user']);
            echo '<meta http-equiv="refresh" content="0;url=AdminUsuarios.php">';
        }
    }    

    $aRegisters = $oRegister->showRegister();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Usuarios</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
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
                <div class="col-md-8 startedAdmin mt-5">
                    <button type="button" class="btn btn-primary buttonModalUser" data-toggle="modal" data-target=".bd-example-modal-sm">Clique aqui para fazer Registro</button>
                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <form class="AdminUserForm" method="GET">
                                    <p>Nome</p>
                                    <input type="text" name="nome_user" id="nome_user" placeholder="Nome">
                                   
                                    <p>Sobrenome</p>
                                    <input type="text" name="sobrenome_user" id="sobrenome_user" placeholder="Sobrenome">
                                   
                                    <p>E-mail</p>
                                    <input type="text" name="email_user" id="email_user" placeholder="E-mail">
                                   
                                    <p>Nome de Usuario</p>
                                    <input type="text" name="nickName_user" id="nickName_user" placeholder="Nome de Usuario">
                                    
                                    <p>Senha</p>
                                    <input type="text" name="senha_user" id="senha_user" placeholder="Senha">
                                    
                                    <p>Tipo</p>
                                    <select value="admin" id="admin" name="admin">
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                    
                                    <button type="submit" class="mt-3 mb-3">Registrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sobrenome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">NickUser</th>
                                <th scope="col">Senha</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aRegisters as $key => $Register){ ?><tr>
                                <td><?php echo $Register['id_user'] ?></td>
                                <td><?php echo $Register['nome_user'] ?></td>
                                <td><?php echo $Register['sobrenome_user'] ?></td>
                                <td><?php echo $Register['email_user'] ?></td>
                                <td><?php echo $Register['nickName_user'] ?></td>
                                <td><?php echo $Register['senha_user'] ?></td>
                                <td><?php echo $Register['admin'] == 1? 'Admin': 'User' ?></td>
                                <td><?php echo '<a href="AdminUsuarioEdit.php?id_user='.$Register['id_user'].'"><img class="AdminIconsTable" src="image/lapis.png"></a>
                                                <a href="AdminUsuarios.php?id_user='.$Register['id_user'].'"><img class="AdminIconsTable" src="image/lixeira.png"></a>' ?></td>
                            </tr><?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-0"></div>
            </div>
        </div>
    </body>
</html>