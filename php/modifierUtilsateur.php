<?php 

    require "connexion_db.php";
    
    $id = $_POST['id'];
	$nom_new = $_POST['nom'];
	$prenom_new = $_POST['prenom'];
	$dateEmbauche_new = date('Y-d-m', strtotime($_POST['dateEmbauche']));
	$adresse_new = $_POST['adresse'];
	$cp_new = $_POST['cp'];
	$ville_new = $_POST['ville'];
    $pwd_new = md5($_POST['pwd']);

	$sql = $db->query("SELECT * FROM users where id = ".$id);
		
		while ($row = $sql->fetch_array(MYSQLI_BOTH)) {
			$nom_old = $row['nom'];
            $prenom_old = $row['prenom'];
            $dateEmbauche_old = date('Y-m-d', strtotime($row['dateEmbauche']));
            $adresse_old = $row['adresse'];
            $cp_old = $row['cp'];
            $ville_old = $row['ville'];
            $pwd_old = $row['pwd'];
		}
		
	if($nom_new == ""){
		$nom = $nom_old;
	} else {
		$nom = $nom_new;
    }
    
	if($prenom_new == ""){
		$prenom = $prenom_old;
	} else {
		$prenom = $prenom_new;
    }
    
	if($dateEmbauche_new == ""){
		$dateEmbauche = $dateEmbauche_old;
	} else {
		$dateEmbauche = $dateEmbauche_new;
    }
    
	if($adresse_new == ""){
		$adresse = $adresse_old;
	} else {
		$adresse = $adresse_new;
    }
    
	if($cp_new == ""){
		$cp = $cp_old;
	} else {
		$cp = $cp_new;
    }

	if($ville_new == ""){
		$ville = $ville_old;
	} else {
		$ville = $ville_old;
    }
    
	if($pwd_new == ""){
		$pwd = $pwd_old;
	} else {
		$pwd = $pwd_old;
	}
	
	// echo $intitule."<br />";
	// echo $lieu."<br />";
	// echo $cp."<br />";
	// echo $ville."<br />";
	// echo $date_diplome."<br />";
	
	//$update = $db->prepare("UPDATE users SET nom = :nom, prenom = :prenom, dateEmbauche = :dateEmbauche, adresse = :adresse, cp = :cp, ville = :ville, pwd = :pwd WHERE id=".$id.";");
	
	$update = $db->query("UPDATE users SET nom = '$nom', prenom = '$prenom', dateEmbauche = STR_TO_DATE('$dateEmbauche','%Y-%m-%d'), adresse = '$adresse', cp = '$cp', ville = '$ville', pwd = '$pwd' WHERE id=$id;");

	//$sql = $db->query("INSERT INTO users (nom, prenom, adresse, cp, ville, `status`, login, pwd, dateEmbauche) VALUES ('$nom',  '$prenom', '$adresse', '$ville', $cp, '$status',  '$login', '$pwd', date($dateEmbauche));");

	/*$update->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'dateEmbauche' => date('Y-m-d', strtotime($dateEmbauche)),
        'adresse' => $adresse,
        'cp' => $cp,
        'ville' => $ville,
        'pwd' => $pwd
	));
*/	
	//print_r($sql->errorInfo());
	
	echo "<script>document.location.replace('listeVisiteur.php');</script>";