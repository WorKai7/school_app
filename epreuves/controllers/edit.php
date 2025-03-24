<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/epreuve.class.php";

    $epreuve = new Epreuve($db);

    $epreuve->fetch($_GET['id']);
}

try {
    if (isset($_POST['confirm_envoyer'])) {
        
        $epreuve->old_numepr = $epreuve->numepr;
        $epreuve->numepr = $_POST["numepr"];
        $epreuve->libepr = $_POST["libepr"];
        $epreuve->ensepr = $_POST["ensepr"];
        $epreuve->matepr = $_POST["matepr"];
        $epreuve->datepr = $_POST["datepr"];
        $epreuve->coefepr = $_POST["coefepr"];
        $epreuve->annepr = $_POST["annepr"];

        $epreuve->update();

        $_SESSION['mesgs']['confirm'][] = "L'épreuve" . $epreuve->numepr . " (" . $epreuve->libepr . ") a bien été modifié dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}