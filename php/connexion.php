<<<<<<< HEAD
<?php @session_start();
    
    require "connexion_db.php";

    $login = $_POST['login'];
    $pwd = md5($_POST['pwd']);

    $result = $db->query("select id, nom, prenom, login, pwd, status from users where login = '".$login."' and pwd = '".$pwd."'");

    $count = $result->rowCount()."<br />";
    // echo $count."<br />";

    // echo $result->queryString."<br />";

    if ($count == 0) {
        echo "ERREUR<br />";
        echo "<a href=\"../index.php\">Retourner à la page de connexion</a>";
    } else {    
        while ($row = $result->fetch()) {

            if ($row['status'] == 'administrateur') {
                $_SESSION['connect'] = "Administrateur";
            } elseif ($row['status'] == "comptable") {
                $_SESSION['connect'] = "Comptable";
            } else {
                $_SESSION['connect'] = "Visiteur";
            }
            /*
            echo "C'est bon<br />";
            echo $row['idStatus']."<br />";
            echo $_SESSION['connect'];
            */
            $_SESSION['id'] = $row['id'];   
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];

            echo "<script>document.location.replace('accueil.php')</script>";
        }
    }

    //print_r($db->errorInfo());


=======
<!-- AFFICHER LES ERREURS PDO -->
<?php @session_start();
    
    require "connexion_db.php";

    $login = $_POST['login'];
    $pwd = md5($_POST['pwd']);

    /*
        echo $login."<br />";
        echo $pwd;
    */

    $sql = $db->Query("select id, login, pwd, status from users where login = ".$login);

        $id = $row['id'];
        $loginExistant = $row['login'];
        $pwdExistant = $row['pwd'];
        $status = $row['idStatus'];

        
        echo "user n° : ".$id."<br />";
        echo "login : ".$login."<br />";
        echo "pwd : ".$pwd."<br />";
        echo "status : ".$status."<br />";
      
/*
    if($login == $loginExistant && $pwd == $pwdExistant) {
        // echo "Tu es connecté";
        if ($status == 0) {
            $_SESSION['connect'] = 0;
        } elseif ($status == 1) {
            $_SESSION['connect'] = 1;
        } else {
            $_SESSION['connect'] = 2;
        }

        echo "<script>document.location.replace(\"accueil.php\")</script>";
    } else {
        echo "ERREUR !<br />";
        echo "<a href=\"../index.php\">Retourner à la page de connexion</a>";
    }
*/



>>>>>>> 325699ee578e347c3142226e213b3999c6a3fccc
    