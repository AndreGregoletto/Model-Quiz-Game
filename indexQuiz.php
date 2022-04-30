<?php
    include "class/AccessDatabase.php";
    include "class/Question.class.php";
    include "class/Answer.class.php";
    include "AccessPrivateLogin.php";

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
        <title>Quick Quiz!</title>
    </head>
    <body class="indexQuizBody mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="endQuiz.php" class="indexQuizForm mt-5" method="GET">
                        <h3 class="pt-4">Seja Bem-vindo ao Quick Quiz!</h3>
                        <img src="image/quizLogo.png">
                        <?php foreach ($aQuests as $key =>$Quest){ ?>

                            <p class="mt-4"><?php echo $Quest['description']?></p> 
                            <p class="questQuizForm mt-3">Escolha a alternativa correta:</p>
                            <?php 
                                $oAnswer = new Answer();
                                
                                $aAnswers = $oAnswer->findIdAnswerQuestion($Quest['id_question']);

                                foreach ($aAnswers as $key => $Answer){
                            ?>                    
                                <div class="container">
                                    <div class="row indexQuizFormAnswers">
                                        <div class="col-xs-12">
                                            <input type="radio" name="answer[<?php echo $Quest['id_question'] ?>]" id="<?php echo $Answer['id'] ?>" value="<?php echo $Answer['id'] ?>">
                                            <label for="<?php echo $Answer['id_question'] ?>"><?php echo $Answer['description'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <button type="submit" class="mt-4">Responder</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>