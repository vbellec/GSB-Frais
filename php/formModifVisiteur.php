<?php @session_start();
    // echo $_SESSION['connect'];
    require "connexion_db.php";

    $id = $_GET['id'];

    $sql = $db->query("SELECT * FROM users WHERE id = ".$id.";");
    
    // echo $sql->queryString."<br />";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, links, icons">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<title>
			GSB - Galaxy Swiss Bourdin
		</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/default.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container corps">
            <div class="row">
                <div class="col-md-12">
                    <h2>Modifier un utilisateur</h2>
                    <br />
                    <form method="POST" action="modifierUtilsateur.php">
                        <?php 
                            while($row = $sql->fetch()) { 
                                $id = $row['id'];
                                $nom = $row ['nom'];
                                $prenom = $row['prenom'];
                                $adresse = $row['adresse'];
                                $cp = $row['cp'];
                                $ville = $row['ville'];
                                $dateEmbauche = $row['dateEmbauche'];
                                $pwd = $row['pwd'];        
                        ?>
                        <div class="form-group col-md-4">
                            <input type="text" value="<?php echo $id; ?>" class="hidden" name="id">
                            <input type="text" class="form-control" placeholder="<?php echo $nom; ?>" name="nom">
                            <br />
                            <input type="text" class="form-control" placeholder="<?php echo $prenom; ?>" name="prenom">
                            <br />
                            <input type="text" class="form-control" id="dateEmbauche" placeholder="<?php echo $dateEmbauche; ?>" name="dateEmbauche">
                            <br />
                            <input type="text" class="form-control" placeholder="<?php echo $adresse; ?>" name="adresse">
                            <br />
                            <input type="text" class="form-control" placeholder="<?php echo $cp; ?>" name="cp">
                            <br />
                            <input type="text" class="form-control" placeholder="<?php echo $ville; ?>" name="ville">
                            <br />
                            <input type="text" class="form-control" placeholder="<?php echo $pwd; ?>" name="pwd">
                            <br />
                            <input type="submit" class="btn btn-success" value="Modifier l'utilisateur">
                        </div>
                    </form>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
        <script>
            $('#dateEmbauche').datepicker({
                dateFormat: "dd/mm/yy"
            });
        </script>
    </body>
</html>