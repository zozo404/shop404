<?php
function getName($pseudo){
    if(require("connexion.php")){
        $req = $access->prepare("SELECT pseudo FROM admin WHERE id ");
        $req->execute(array($pseudo));
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        // erreur ?
        $req->closeCursor();
    }
}
?>