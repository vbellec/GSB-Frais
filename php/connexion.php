<?php @session_start();
    
    require "connexion_db.php";

    $login = $_POST['login'];
    $pwd = md5($_POST['pwd']);

    $result = $db->query("select id, nom, prenom, login, pwd, idStatus from users where login = '".$login."' and pwd = '".$pwd."'");

    $count = $result->rowCount()."<br />";
    // echo $count."<br />";

    // echo $result->queryString."<br />";

    if ($count == 0) {
        echo "ERREUR<br />";
        echo "<a href=\"../index.php\">Retourner à la page de connexion</a>";
    } else {    
    while ($row = $result->fetch()) {

            if ($row['idStatus'] == 'admin') {
                $_SESSION['connect'] = "Administrateur";
            } elseif ($row['idStatus'] == "medec") {
                $_SESSION['connect'] = "Médecin";
            } else {
                $_SESSION['connect'] = "Visiteur";
            }
            /*
            echo "C'est bon<br />";
            echo $row['idStatus']."<br />";
            echo $_SESSION['connect'];
            */
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];

            echo "<script>document.location.replace('accueil.php')</script>";
        }
    }

    //print_r($db->errorInfo());


    