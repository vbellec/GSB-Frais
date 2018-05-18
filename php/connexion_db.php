<<<<<<< HEAD

<?php
    $user = "root";
    $pass="root";

    $db = new PDO('mysql:host=localhost;dbname=gsb', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>
=======

<?php
    $user = "root";
    $pass="";

    $db = new PDO('mysql:host=localhost;dbname=gsb', $user, $pass);
?>
>>>>>>> 325699ee578e347c3142226e213b3999c6a3fccc
