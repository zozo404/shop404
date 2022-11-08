<?php
// connexion à la bdd
$servername='localhost';
$username = 'root';
try{
    $access = new PDO("mysql:host=$servername;dbname=shop404;port=3306;charset=utf8", $username,"");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e){
    echo "ERROR: ".$e->getMessage()."<br>";
    
}
?>