<?php

    class Answer extends AccessDatabase{

        public function findIdAnswerQuestion($id)
        {
            $data = $this->aD->query("select * from tb_quiz_answer where id_question = '".$id."' ");
            $assoc = $data->fetchAll(PDO::FETCH_ASSOC);
            
            return $assoc;
        }

        public function getIdQuest($id)
        {
            $data = $this->aD->query("select * from tb_quiz_answer where id = '".$id."' ");
            $assoc = $data->fetchAll(PDO::FETCH_ASSOC);
            
            return $assoc;
        }

    }
    
?>