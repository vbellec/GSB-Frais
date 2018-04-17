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



    