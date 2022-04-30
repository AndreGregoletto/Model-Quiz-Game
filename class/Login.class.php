<?php

    class Login extends AccessDatabase{
        
        public function getLoginCheck($aRequest)
        {
            $user = $this->aD->query("select * from tb_usuarios where nickName_user = '".$aRequest['nickName_user']."' and senha_user = '".$aRequest['senha_user']."' ");
            $aUser = $user->fetchAll(PDO::FETCH_ASSOC);
            
            return $aUser;
        }

        public function getLoginComplet($aRequest)
        {
            if(!empty($aRequest)){
                $user = $this->aD->query("select * from tb_usuarios where nickName_user = '".$aRequest['nickName_user']."' and senha_user = '".$aRequest['senha_user']."' ");
                $UserComplet = $user->fetchAll(PDO::FETCH_ASSOC);

                return $UserComplet;
            }
 
        }
    
    }

?>