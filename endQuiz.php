<?php
    include "class/AccessDatabase.php";
    include "class/login.class.php";
    include "class/Answer.class.php";
    include "class/Selected.class.php";
    include "class/Question.class.php";
    include "AccessPrivateLogin.php";

    $aAnswers = $_GET['answer'];
    $aSelected = [];
    $i = 0;

    $oSelected = new Selected();
    foreach ($aAnswers as $key => $answer) {
        $aSelected[$i]['id_question'] = (int) $key;
        $aSelected[$i]['id_answer']   = $answer;
        $aSelected[$i]['id_user']     = 1;
        
        $oSelected->create($aSelected[$i]);
        $i++;
    }

    $oQuest  = new Question();

    $aQuests = $oQuest->getAllQuestion();
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
        <title>Cadastro</title>
    </head>
    <body class="endQuizBody">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mt-5">
                    <div class="row d-flex">
                        <div class="col-xs-12  endQuizCamp">
                        <h2>Parabéns! Quiz finalizado!</h2>
                            <?php
                                $True = 0;
                                $False = 0;
                                $ask = 1;

                                foreach ($aQuests as $key => $quest) {
                                    echo "<p class='endQuizCampQuest'>".$ask++.'° -  '.$quest['description']."</p>";

                                    $aAnswersSelecteds = $oSelected->getAnswerByQuestion($quest['id_question']);
                                    
                                    foreach ($aAnswersSelecteds as $key => $AnswersSelected) {
                                        
                                        if($AnswersSelected['correct'] == "1"){
                                            $class = 'text-green';
                                            $True++ ;
                                        }elseif($AnswersSelected['id'] == $AnswersSelected['id_answer'] && $AnswersSelected['correct'] == 0){
                                            $class = 'text-red';
                                            $False++ ;
                                        }else{
                                            $class = 'text-black';
                                        }
                                        echo '<span class="'.$class.'"><span class="endQuizCampAnswer">R: </span>'.$AnswersSelected['description'].'</span>';
                                        echo '<br>';     
                                    }
                                    echo '<hr>'; 
                                }
                                echo '<p class="endQuizCampQuestResult">Total de '.$True.' respostas certas e '.$False.' erradas!</p>'
                            ?>     
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <a href="Logout.php"><button class="endQuizCampButton">Sair</button></a>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
               
                        </div>
                    </div> 
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>