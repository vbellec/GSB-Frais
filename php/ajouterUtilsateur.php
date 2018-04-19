<?php

    require "connexion_db.php";

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateEmbauche = date('Y-m-d', strtotime($_POST['dateEmbauche']));
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $login = strtolower($_POST['nom']);
    $pwd = md5($_POST['pwd']);
    $status = "visit";

    /*
    echo "nom : ".$nom."<br />";
    echo "prenom : ".$prenom."<br />";
    echo "dateEmbauche : ".$dateEmbauche."<br />";
    echo "adresse : ".$adresse."<br />";
    echo "cp : ".$cp."<br />";
    echo "ville : ".$ville."<br />";
    echo "login : ".$login."<br />";
    echo "pwd : ".$pwd."<br />";
    echo "status : ".$status."<br />";
    */

    $sql = $db->prepare('INSERT INTO users (nom, prenom, adresse, cp, ville, idStatus, login, pwd, dateEmbauche) VALUES (:nom, :prenom, :adresse, :cp, :ville, :idStatus, :login, :pwd, :dateEmbauche);');

    $sql->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'adresse' => $adresse,
        'ville' => $ville,
        'cp' => $cp,
        'idStatus' => $status,
        'login' => $login,
        'pwd' => $pwd,
        'dateEmbauche' => $dateEmbauche
    ));

    echo "<script>document.location.replace('gestionVisiteur.php');</script>";