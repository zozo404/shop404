<?php
// se déconnecter de la session
session_start();
if(isset($_SESSION['zozoy001'])){
    $_SESSION['zozoy001']= array();

    session_destroy();
    header("Location: ../");
}else{
    header("Location: ../login.php");
}

?>