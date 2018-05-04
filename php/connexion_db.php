
<?php
    $user = "root";
    $pass="";

    $db = new PDO('mysql:host=localhost;dbname=gsb', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
?>
