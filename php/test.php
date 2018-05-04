<?php
require "connexion_db.php";

$id = $_POST['id'];

echo "id = ".$id;

$result = $db->query("select * from users where id = ".$id);

while ($row = $result->fetch()) {
    $nom = $row['nom'];

    echo $nom;
}