<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/cours.class.php";

    $cours = new Cours($db);

    $cle = explode("-", $_GET["id"]);
    $numens = $cle[0];
    $nummat = $cle[1];
    $annee = $cle[2];

    $cours->fetch($numens, $nummat, $annee);
}