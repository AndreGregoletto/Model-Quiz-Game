<?php

    class Register extends AccessDatabase{
        
        public function saveRegister($aSave)
        {
            if(!empty($aSave)){
                $query = $this->aD->exec("insert into tb_usuarios (nome_user, sobrenome_user, email_user, nickName_user, senha_user, admin) 
                                        values ('".$aSave['nome_user']."', '".$aSave['sobrenome_user']."', '".$aSave['email_user']."', 
                                        '".$aSave['nickName_user']."', '".$aSave['senha_user']."', '".$aSave['admin']."')");
            }
        }

        public function showRegister()
        {
            $adminDados = $this->aD->query("select * from tb_usuarios");
            $adminAssoc = $adminDados->fetchALL(PDO::FETCH_ASSOC);

            return $adminAssoc;
        }

        public function GetIdUser($id)
        {
            $adminDados = $this->aD->query("select * from tb_usuarios where id_user = '".$id."'");
            $adminAssoc = $adminDados->fetchALL(PDO::FETCH_ASSOC);

            return $adminAssoc;
        }

        public function AdminUserDellet($iUser)
        {
            if($iUser > 0){
                $query = $this->aD->exec("delete from tb_usuarios where id_user = '".$iUser."' ");

                return $query;
            }
        }

        public function AdminUserEdit($aUser)
        {
            $query = $this->aD->exec("update tb_usuarios set nome_user = '".$aUser['nome_user']."', sobrenome_user = '".$aUser['sobrenome_user']."', 
                                    email_user = '".$aUser['email_user']."', senha_user = '".$aUser['senha_user']."', admin = '".$aUser['amin']."' 
                                    where id_user = '".$aUser['id_user']."'  ");
        }
    
    }

    class AdminAsnwer extends AccessDatabase{

        public function AdminAnswerShow()
        {
            $adminDados = $this->aD->query("select * from tb_quiz_answer");
            $adminAssoc = $adminDados->fetchALL(PDO::FETCH_ASSOC);

            return $adminAssoc;
        }

        public function AdminAnswerAdd($aAnswer)
        {
            if(!empty($aAnswer)){
                $query = $this->aD->exec("insert into tb_quiz_answer (id_question, description, correct, active) 
                                        value ('".$aAnswer['id_question']."', '".$aAnswer['description']."', 
                                        '".$aAnswer['correct']."', '".$aAnswer['active']."')");
            }
        }

        public function AdminGetIdAnswer($id)
        {
            $adminDados = $this->aD->query("select * from tb_quiz_answer where id = '".$id."'");
            $adminAssoc = $adminDados->fetchALL(PDO::FETCH_ASSOC);

            return $adminAssoc;
        }

        public function AdminAnswerDellet($iAnswer)
        {
            if($iAnswer > 0){
                $query = $this->aD->exec("delete from tb_quiz_answer where id = '".$iAnswer."'");

                return $query;
            }
        }

        public function AdminAnswerEdit($aAnswer)
        {
            $query = $this->aD->exec("update tb_quiz_answer set id_question = '".$aAnswer['id_question']."', 
                                    description = '".$aAnswer['description']."', correct = '".$aAnswer['correct']."', 
                                    active = '".$aAnswer['active']."' where id = '".$aAnswer['id']."' ");
        }

    }
    
?>