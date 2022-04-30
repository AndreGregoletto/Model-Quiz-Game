<?php
    class Selected extends AccessDatabase {

        public function create($aData)
        {
            $data = $this->aD->exec("insert into tb_quiz_selected (id_user, id_question, id_answer) 
                                    values ('".$aData['id_user']."', '".$aData['id_question']."', '".$aData['id_answer']."')");
        }

        public function getAnswerByQuestion($IdQuestion)
        {
            $data = $this->aD->query("select * from `tb_quiz_answer` 
                                   LEFT JOIN tb_quiz_selected 
                                   on tb_quiz_answer.id=tb_quiz_selected.id_answer 
                                   where tb_quiz_answer.id_question = '".$IdQuestion."' ");
            $aAnswers = $data->fetchAll(PDO::FETCH_ASSOC);

            return $aAnswers;
        }

    }
?>