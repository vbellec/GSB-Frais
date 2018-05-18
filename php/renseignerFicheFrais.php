<?php 
    require "connexion_db.php";

    $id = $_POST['id'];

    $mois = $_POST['mois'];
    $annee = $_POST['annee'];

    $etape = $_POST['etape'];
    $nuit = $_POST['nuitee'];
    $repas = $_POST['repas'];
    $km = $_POST['km'];

    $montant = $_POST['montant'];
    $libelle = $_POST['libelle'];

    if(isset($_POST['fraisAuForfait'])) {
        $montantREP = $db->query("select montant from forfait where id = \"REP\";");
        $montantNUI = $db->query("select montant from forfait where id = \"NUI\";");
        $montantETP = $db->query("select montant from forfait where id = \"ETP\";");
        $montantKM = $db->query("select montant from forfait where id = \"KM\";");

        while($row = $montantETP->fetch()) {
            $ETP = $row['montant'];
            $prixETP = $ETP * $etape;
        }
        while($row = $montantNUI->fetch()) {
            $NUI = $row['montant'];
            $prixNUI = $NUI * $nuit;
        }
        while($row = $montantREP->fetch()) {
            $REP = $row['montant'];
            $prixREP = $REP * $repas;
        }
        while($row = $montantKM->fetch()) {
            $KM = $row['montant'];
            $prixKM = $KM * $km;
        } 
    
        /*
        echo $prixREP."<br />";
        echo $prixNUI."<br />";
        echo $prixETP."<br />";
        echo $prixKM."<br />";
        */

        $montantValide = $prixREP + $prixNUI + $prixETP + $prixKM;
        //echo $montantValide;

        $insertFicheFrais = $db->prepare("insert into fichefrais (idVisiteur, mois, annee, montantValide, idEtat) 
                                        values (:idVisiteur, :mois, :annee, :montantValide, :idEtat);");
        $insertFicheFrais->execute(array(
            "idVisiteur" => $id,
            "mois" => $mois,
            "annee" => $annee,
            "montantValide" => $montantValide,
            "idEtat" => "CR"
        ));

        $sqlIdFicheFrais = $db->query("select max(id) from fichefrais;");
        while($row = $sqlIdFicheFrais->fetch()){
            $idFicheFrais = $row[0];
            //echo $idFicheFrais;
        }

        $insertLigneFraisForfaitETP = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite);");
        $insertLigneFraisForfaitETP->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "ETP",
            "quantite" => $etape
        ));

        $insertLigneFraisForfaitNUI = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite)");
        $insertLigneFraisForfaitNUI->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "NUI",
            "quantite" => $nuit
        ));

        $insertLigneFraisForfaitREP = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite)");
        $insertLigneFraisForfaitREP->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "REP",
            "quantite" => $repas
        ));

        $insertLigneFraisForfaitKM = $db->prepare("insert into lignefraisforfait (idFicheFrais, idForfait, quantite)
                                                    values (:idFicheFrais, :idForfait, :quantite)");
        $insertLigneFraisForfaitKM->execute(array(
            "idFicheFrais" => $idFicheFrais,
            "idForfait" => "KM",
            "quantite" => $km
        ));

        echo "<script>document.location.replace('formRenseignerFicheFrais.php');</script>";
    } else {
        $montant = $_POST['montant'];
        $date = date('Y-m-d', strtotime($_POST['date']));
        $libelle = $_POST['libelle'];

        $insertHorsForfait = $db->prepare("insert into fraishorsforfait (montant, date, libelle, idVisiteur)
                                            values (:montant, :date, :libelle, :idVisiteur);");
        $insertHorsForfait->execute(array(
            "montant" => $montant,
            "date" => $date,
            "libelle" => $libelle,
            "idVisiteur" => $id
        ));

        echo "<script>document.location.replace('formRenseignerFicheFrais.php');</script>";
    }

?>