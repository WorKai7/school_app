<?php

include dirname(__FILE__) . "/../../class/cours.class.php";

$cours_list = Cours::fetchAll($db);

try {
    if (isset($_POST["confirm_envoyer"])) {
        $filters = $_POST;

        unset($filters["confirm_envoyer"]);

        foreach ($filters as $key => $val) {
            if (empty($val)) {
                unset($filters[$key]);
            }
        }

        $cours_list = Cours::find($db, $filters);
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}