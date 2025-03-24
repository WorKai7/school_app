<?php
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $classement = Etudiants::getGeneralLeaderboard($db);
    $etudiants = $classement[0];
    $notes = $classement[1];
    

    if (isset($_POST["confirm_envoyer"])) {
        if ($_POST["annetu"] && $_POST["nummod"]) {
            $classement = Etudiants::getGeneralLeaderboard($db, $_POST["annetu"], $_POST["nummod"]);
        } else if ($_POST["annetu"]) {
            $classement = Etudiants::getGeneralLeaderboard($db, $_POST["annetu"]);
        } else if ($_POST["nummod"]) {
            $classement = Etudiants::getGeneralLeaderboard($db, null, $_POST["nummod"]);
        }
        $etudiants = $classement[0];
        $notes = $classement[1];
    }
