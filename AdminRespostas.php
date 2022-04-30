<?php
    include "class/AccessDatabase.php";
    include "class/Register.class.php";
    include "class/Question.class.php";
    include "AccessPrivateLogin.php";

    $oQuest = new AdminQuestion();

    $aQuests = $oQuest->AdminShowQuestion();

    $oAdminAnswer = new AdminAsnwer();

    $aAdminAnswers = $oAdminAnswer->AdminAnswerShow();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $oAdminAnswer->AdminAnswerDellet($_GET['id']);
        echo '<meta http-equiv="refresh" content="0;url=AdminRespostas.php">';
    }else{
        if(isset($_GET['description']) && !empty($_GET['description'])){
            $oAdminAnswer->AdminAnswerAdd($_GET);
            echo '<meta http-equiv="refresh" content="0;url=AdminRespostas.php">';
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Respostas</title>
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
                <div class="col-md-7 startedAdmin mt-5">
                    <div class="buttonModal">
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target=".bd-example-modal-lg">Clique para adicionar respostas</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form class="addQuestionCamp" method="GET">
                                        <p>Perguntas:</p>
                                        <select class="perguntasAdminAdd" name="id_question" id="id_question" value="id_question">
                                            <?php foreach ($aQuests as $key => $Quest){ ?>
                                            <option value="<?php echo $Quest['id_question'] ?>"><?php echo $Quest['description'] ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                        <p>Resposta:</p>
                                        <input type="text" name="description" id="description" placeholder="Sua pergunta aqui">
                                        <div class="container">
                                            <div class="row d-flex">
                                                
                                                <div class="col-sm-6 AnswersModal">
                                                    <p>Verdadeiro ou Falso?</p>
                                                    <select value="correct" name="correct" id="correct">
                                                        <option value="1">Verdadeira</option>
                                                        <option value="0">Falsa</option>
                                                    </select>  
                                                </div>
                                                
                                                <div class="col-sm-6 AnswersModal">
                                                    <p>Status</p>
                                                    <select value="active" name="active" id="active">
                                                        <option value="1">Ativa</option>
                                                        <option value="0">Inativa</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                        <button class="mt-2" type="submit">Salvar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Id R</th>
                            <th scope="col">Id P</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Resultado</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($aAdminAnswers as $key => $AdminAnswer){ ?><tr>
                                <td><?php echo $AdminAnswer['id'] ?></td>
                                <td><?php echo $AdminAnswer['id_question'] ?></td>
                                <td><?php echo $AdminAnswer['description'] ?></td>
                                <td><?php echo $AdminAnswer['correct'] == 1? 'Correta': 'Errada' ?></td>
                                <td><?php echo $AdminAnswer['active'] == 1? 'Ativa': 'Inativa' ?></td>
                                <td><?php echo '<a href="AdminRespostasEdit.php?id='.$AdminAnswer['id'].'"><img class="AdminIconsTable" src="image/lapis.png"></a>
                                          <a href="AdminRespostas.php?id='.$AdminAnswer['id'].'"><img class="AdminIconsTable" src="image/lixeira.png"></a>' ?></td>
                            </tr><?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>