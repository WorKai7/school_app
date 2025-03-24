<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/matiere.class.php";
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $matiere = new Matiere($db);

    $matiere->fetch($_GET['id']);

    $classement = $matiere->getLeaderboard();

    $etudiants = array();
    $notes = array();

    foreach ($classement as $ligne) {
        $etudiants[] = new Etudiants($db, $ligne);
        $notes[] = $ligne["moyenne"];
    }
}