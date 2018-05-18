<?php

    require "connexion_db.php";

    $id = $_POST['id'];
    $new_etape = $_POST['etape'];
    $new_km = $_POST['km'];
    $new_nuit = $_POST['nuit'];
    $new_repas = $_POST['repas'];

    /* ETAPE */
    $sqlEtape = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"ETP\";");
    while ($row = $sqlEtape->fetch()) {
        $old_etape = $row['quantite'];
    }
    if($new_etape == ""){
		$etape = $old_etape;
	} else {
		$etape = $new_etape;
    }
    $updateEtape = $db->prepare("update lignefraisforfait set quantite = :quantite where idFicheFrais = ".$id." and idForfait = \"ETP\";");
    $updateEtape->execute(array(
        "quantite" => $etape
    ));

    /* KILOMETRE */
    $sqlKm = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"KM\";");
    while ($row = $sqlKm->fetch()) {
        $old_km = $row['quantite'];
    }
    if($new_km == ""){
		$km = $old_km;
	} else {
		$km = $new_km;
    }
    $updateKm = $db->prepare("update lignefraisforfait set quantite = :quantite where idFicheFrais = ".$id." and idForfait = \"KM\";");
    $updateKm->execute(array(
        "quantite" => $km
    ));

    /* NUITEE */
    $sqlNuit = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"NUI\";");
    while ($row = $sqlNuit->fetch()) {
        $old_nuit = $row['quantite'];
    }
    if($new_nuit == ""){
		$nuit = $old_nuit;
	} else {
		$nuit = $new_nuit;
    }
    $updateNuit = $db->prepare("update lignefraisforfait set quantite = :quantite where idFicheFrais = ".$id." and idForfait = \"NUI\";");
    $updateNuit->execute(array(
        "quantite" => $nuit
    ));

    /* REPAS */
    $sqlRepas = $db->query("SELECT quantite FROM lignefraisforfait WHERE idFicheFrais = ".$id." and idForfait = \"REP\";");
    while ($row = $sqlRepas->fetch()) {
        $old_repas = $row['quantite'];
    }
    if($new_repas == ""){
		$repas = $old_repas;
	} else {
		$repas = $new_repas;
    }
    $updateRepas = $db->prepare("update lignefraisforfait set quantite = :quantite where idFicheFrais = ".$id." and idForfait = \"REP\";");
    $updateRepas->execute(array(
        "quantite" => $repas
    ));

    echo "<script>document.location.replace('formlisteFicheFrais.php');</script>";