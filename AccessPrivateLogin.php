<?php

    session_start();
    if(!isset($_SESSION['user'])){
        echo '<meta http-equiv="refresh" content="0;url=homePage.php">';
        echo '<script>alert("Faça Login para ter acesso")</script>';
    }
    
?>