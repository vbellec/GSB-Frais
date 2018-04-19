<?php @session_start();
    // echo $_SESSION['connect'];
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
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-bleu fixed-top">
            <a class="navbar-brand" href="#">
                <span class="gras">GSB</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!-- CONTROLE DU STATUS -->
                    <!-- ADMINISTRATEUR -->
                    <?php 
                        if ($_SESSION['connect'] == "Administrateur") { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="gestionVisiteur.php">Gestion des visiteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestion des utilisateurs</a>
                    </li>
                    <!-- MEDECIN -->
                    <?php    
                        } elseif ($_SESSION['connect'] == "Médecin") { 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestion des visiteur</a>
                    </li>
                    <!-- VISITEUR -->
                    <?php    
                        } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestion des utilisateurs</a>
                    </li>
                    <?php        
                        }
                    ?>
                    <!-- FIN DU CONTROLE DU STATUS -->
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php">
                            Se déconnecter
                        </a>
                    </li>
                </ul>
                <h1 class="centre-nav">Bienvenue <?php echo $_SESSION['prenom']. " ".strtoupper($_SESSION['nom']); ?></h1>
                <span class="nav-link blanc status">status : <?php echo $_SESSION['connect']; ?></span>
            </div>
        </nav>
        <div class="container corps">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </body>
</html>