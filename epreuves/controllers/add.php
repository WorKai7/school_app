<?php

include dirname(__FILE__) . "/../../class/epreuve.class.php";

try {
    if (isset($_POST["confirm_envoyer"])) {

        $data = array(
            "numepr" => $_POST["numepr"],
            "libepr" => $_POST["libepr"],
            "ensepr" => $_POST["ensepr"],
            "matepr" => $_POST["matepr"],
            "datepr" => $_POST["datepr"],
            "coefepr" => $_POST["coefepr"],
            "annepr" => $_POST["annepr"]
        );

        $epreuve = new Epreuve($db, $data);
        $epreuve->create();

        $_SESSION['mesgs']['confirm'][] = "L'épreuve" . $epreuve->numepr . " (" . $epreuve->libepr . ") a bien été inséré dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}