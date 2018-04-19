<?php
    require "connexion_db.php";

    $id = $_GET['id'];

    echo $id;

    $sql = $db->exec("DELETE FROM users WHERE id=".$id);

    echo "<script>document.location.replace('gestionVisiteur.php');</script>";