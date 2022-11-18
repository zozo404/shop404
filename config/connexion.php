<?php
// connexion à la bdd
$servername='localhost';
$username = 'root';
$database = 'shop404';
try{
    $access = new PDO("mysql:host=$servername;dbname=$database;port=3306;charset=utf8", $username,"");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e){
    echo "ERROR: ".$e->getMessage()."<br>";
    
}
?>