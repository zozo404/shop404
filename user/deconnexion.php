<?php
// se déconnecter de la session
session_start();
if(isset($_SESSION['test001'])){
    $_SESSION['test001']= array();

    session_destroy();
    header("Location: ../");
}else{
    header("Location: ../login.php");
}

?>