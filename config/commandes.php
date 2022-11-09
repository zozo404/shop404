<?php

function ajouter($nom,$image,$alt,$prix,$desc){
    if(require("connexion.php")){
        $req = $access->prepare("INSERT INTO produits (image, alt, nom, prix, description) VALUE ('$image','$alt','$nom',$prix,'$desc')");
        $req->execute(array($nom,$image,$prix,$desc));
        $req->closeCursor();
    }
}

function afficher(){
    if(require("connexion.php")){
        $req=$access->prepare("SELECT * from produits ORDER BY id DESC");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        // erreur ?
        $req->closeCursor();

    }
}

function supprimer($id){
    if(require("connexion.php")){
        // DELETE *
        $req = $access->prepare("DELETE FROM produits WHERE id=?");
        $req->execute(array($id));

    }
}

?>