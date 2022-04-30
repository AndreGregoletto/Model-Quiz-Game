<?php

    class Question extends AccessDatabase{
        
        public function getAllQuestion()
        {
            $data = $this->aD->query("select * FROM tb_quiz_question where active = 1");
            $assoc = $data->fetchAll(PDO::FETCH_ASSOC);
            
            return $assoc;
        }

    }

    class AdminQuestion extends AccessDatabase{

        public function AdminShowQuestion()
        {
            $adminDados = $this->aD->query("select * from tb_quiz_question");
            $adminAssoc = $adminDados->fetchALL(PDO::FETCH_ASSOC);

            return $adminAssoc;
        }

        public function AdminAddQuestion($aQuestion)
        {
            if(!empty($aQuestion)){
                $query = $this->aD->exec("insert into tb_quiz_question (description, active) 
                                        value ('".$aQuestion['description']."', '".$aQuestion['active']."') ");
            }
        }

        public function AdminGetId($id)
        {
            $adminDados = $this->aD->query("select * from tb_quiz_question where id_question = '".$id."'");
            $adminReturn = $adminDados->fetchALL(PDO::FETCH_ASSOC);

            return $adminReturn;
        }

        public function AdminDellet($iQuestion)
        {
            if($iQuestion > 0){
                $query = $this->aD->exec("delete from tb_quiz_question where id_question = '".$iQuestion."'");
                
                return $query;
            }
        }

        public function AdminEdit($aQuestion)
        {
            $query = $this->aD->exec("update tb_quiz_question set 
                                    description = '".$aQuestion['description']."', active = '".$aQuestion['active']."' 
                                    where id_question = '".$aQuestion['id_question']."' ");
        }

    }

?>