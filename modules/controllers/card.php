<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/module.class.php";
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $module = new Module($db);

    $module->fetch($_GET['id']);

    $classement = $module->getLeaderboard();

    $etudiants = array();
    $notes = array();

    foreach ($classement as $ligne) {
        $etudiants[] = new Etudiants($db, $ligne);
        $notes[] = $ligne["moyenne"];
    }
}