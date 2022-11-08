<?php

function ajouter($nom,$image,$prix,$desc){
    if(require("connexion.php")){
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUE ($image,$nom,$prix,$desc)");
        $req->execute(array($nom,$image,$prix,$desc));
        $req->closeCursor();
    }
}

function afficher(){
    if(require("connexion.php")){
        $req=$access->prepare("SELECT * from produits ORDER BY id DESC");
    }
}

?>