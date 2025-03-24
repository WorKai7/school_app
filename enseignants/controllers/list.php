<?php

include dirname(__FILE__) . "/../../class/enseignant.class.php";

$enseignants = Enseignant::fetchAll($db);

try {
    if (isset($_POST["confirm_envoyer"])) {
        $filters = $_POST;

        unset($filters["confirm_envoyer"]);

        foreach ($filters as $key => $val) {
            if (empty($val)) {
                unset($filters[$key]);
            }
        }

        $enseignants = Enseignant::find($db, $filters);
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}