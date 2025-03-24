<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/epreuve.class.php";
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $epreuve = new Epreuve($db);
    $epreuve->fetch($_GET['id']);

    $classement = $epreuve->getLeaderboard();

    $etudiants = array();
    $notes = array();

    foreach ($classement as $ligne) {
        $etudiants[] = new Etudiants($db, $ligne);
        $notes[] = $ligne["note"];
    }
}