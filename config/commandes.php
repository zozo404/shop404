<?php

function modifier($image, $nom, $prix, $desc, $id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

        $req->execute(array($image, $nom, $prix, $desc, $id));

        $req->closeCursor();
    }
}
function getProduit($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } else {
            return false;
        }

        $req->closeCursor();
    }
}
function getAdmin($email, $password)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        $req->execute(array($email, $password));

        if ($req->rowCount() == 1) {
            $data = $req->fetch();
            return $data;
        } else {
            return false;
        }

        $req->closeCursor();
    }
}
function getUser($email, $password)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $req->execute(array($email, $password));
        
        if ($req->rowCount() == 1) {
            $data = $req->fetch();
            return $data;
        } else {
            return false;
        }
        
        $req->closeCursor();
    }
}
function addUser($email, $password)
{
    if (require("connexion.php")) {
        // verification de l'email pour empêcher les doublons
        $reqVerif = $access->prepare('SELECT id from user WHERE email = ?');
        $reqVerif->execute([$_POST['email']]);
        $user = $reqVerif->fetch();
        // si email deja existant
        if ($user) {
            echo "<p class='bg-red-500 text-black py-4 text-xl'>ERROR: email deja prit</p>";
            $reqVerif->closeCursor();
        }
        // si le mail n'existe pas
        else{
            $req = $access->prepare("INSERT INTO user ( email, password) VALUE ('$email','$password')");
            $req->execute(array($email, $password));
            
            $req->closeCursor();
        }
    }
}
function ajouter($nom, $image, $alt, $prix, $desc)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO produits (image, alt, nom, prix, description) VALUE ('$image','$alt','$nom',$prix,'$desc')");
        $req->execute(array($nom, $image, $prix, $desc, $alt));
        $req->closeCursor();
    }
}

function afficher()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * from produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        // erreur ?
        $req->closeCursor();
    }
}

function supprimer($id)
{
    if (require("connexion.php")) {
        // DELETE *
        $req = $access->prepare("DELETE FROM produits WHERE id=?");
        $req->execute(array($id));
    }
}
