<?php

include dirname(__FILE__) . "/../../class/cours.class.php";

try {
    if (isset($_POST["confirm_envoyer"])) {

        $data = array(
            "nummat" => $_POST["nummat"],
            "numens" => $_POST["numens"],
            "annee" => $_POST["annee"]
        );


        $cours = new Cours($db, $data);
        $cours->create();

        $_SESSION['mesgs']['confirm'][] = "Le cours de " . $cours->getMatName() . " a bien été inséré dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "ERREUR, LE COURS EXISTE PEUT-ÊTRE DÉJÀ: $e";
}