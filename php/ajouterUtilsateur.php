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
    $status = "visiteur";

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

    // echo "INSERT INTO users (nom, prenom, adresse, cp, ville, `status`, login, pwd, dateEmbauche) VALUES ('$nom',  '$prenom', '$adresse', '$ville', $cp, '$status',  '$login', '$pwd', date($dateEmbauche));";

    $sql = $db->query("INSERT INTO users (nom, prenom, adresse, cp, ville, `status`, login, pwd, dateEmbauche) VALUES ('$nom',  '$prenom', '$adresse', '$ville', $cp, '$status',  '$login', '$pwd', STR_TO_DATE('$dateEmbauche','%Y-%m-%d'));");
      
    header('location: listeVisiteur.php');

    