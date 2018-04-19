<?php @session_start();
    // echo $_SESSION['connect'];
    require "connexion_db.php";
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
                    <h2>Ajouter un utilisateur</h2>
                    <br />
                    <form method="POST" action="ajouterUtilsateur.php">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" placeholder="Nom de l'utilisateur *" required="required" name="nom">
                            <br />
                            <input type="text" class="form-control" placeholder="Prénom de l'utilisateur *" required="required" name="prenom">
                            <br />
                            <input type="text" class="form-control" id="dateEmbauche" placeholder="Date d'embauche" name="dateEmbauche">
                            <br />
                            <input type="text" class="form-control" placeholder="Adresse" name="adresse">
                            <br />
                            <input type="text" class="form-control" placeholder="CP" name="cp">
                            <br />
                            <input type="text" class="form-control" placeholder="Ville" name="ville">
                            <br />
                            <input type="text" class="form-control" placeholder="Mot de passe *" required="required" name="pwd">
                            <br />
                            <input type="submit" class="btn btn-success" value="Ajouter l'utilisateur">
                        </div>
                    </form>
                    <small>* Les champs marqué "*" sont obligatoires</small><br />
                    <small>** le login sera le nom de famille de l'utilisateur en minuscule</small>
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