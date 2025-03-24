<?php

include dirname(__FILE__) . "/../../class/etudiant.class.php";

$etudiants = Etudiants::fetchAll($db);


try {
    if (isset($_POST["confirm_envoyer"])) {
        $filters = $_POST;

        unset($filters["confirm_envoyer"]);

        foreach ($filters as $key => $val) {
            if (empty($val)) {
                unset($filters[$key]);
            }
        }

        $etudiants = Etudiants::find($db, $filters);
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}