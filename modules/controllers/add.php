<?php

include dirname(__FILE__) . "/../../class/module.class.php";

try {
    if (isset($_POST["confirm_envoyer"])) {

        $data = array(
            "nummod" => $_POST["nummod"],
            "nommod" => $_POST["nommod"],
            "coefmod" => $_POST["coefmod"]
        );

        $module = new Module($db, $data);
        $module->create();

        $_SESSION['mesgs']['confirm'][] = "Le module" . $module->nummod . " (" . $module->nommod . ") a bien été inséré dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}