<?php

include dirname(__FILE__) . "/../../class/matiere.class.php";

try {
    if (isset($_POST["confirm_envoyer"])) {

        $data = array(
            "nummat" => $_POST["nummat"],
            "nommat" => $_POST["nommat"],
            "nummod" => $_POST["nummod"],
            "coefmat" => $_POST["coefmat"]
        );


        $matiere = new Matiere($db, $data);
        $matiere->create();

        $_SESSION['mesgs']['confirm'][] = "La matière n°" . $matiere->nummat . " (" . $matiere->nommat . ") a bien été inséré dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}