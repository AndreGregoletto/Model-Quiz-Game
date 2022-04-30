<?php
    include "class/AccessDatabase.php";
    include "class/Question.class.php";
    include "AccessPrivateLogin.php";

    $oAdminEdit = new AdminQuestion();

    $aAdminEdits = $oAdminEdit->AdminGetId($_GET['id_question']);

    if($_GET['acao'] == 'alterar' and !is_null($_GET['acao'])) {
        $oAdminEdit->AdminEdit($_GET);
        echo '<meta http-equiv="refresh" content="0;url=AdminPerguntas.php">';
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
                    <form class="AdminEditForm" method="GET">
                        <input type="text" name="id_question" id="id_question" value="<?php echo $aAdminEdits[0]['id_question'] ?>" hidden>
                        
                        <p>Pergunta:</p>
                        <input type="text" name="description" id="description" value="<?php echo $aAdminEdits[0]['description'] ?>">
                        
                        <p>Status:</p>
                        <select name="active" id="active" value="<?php echo $aAdminEdits[0]['active'] ?>">
                            <option value="1">Ativa</option>
                            <option value="0">Inativa</option>
                        </select>
                        
                        <button class="mt-1" type="submit">Editar</button>
                        
                        <input type="hidden" name="acao" value="alterar">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>   
    </body>
</html>