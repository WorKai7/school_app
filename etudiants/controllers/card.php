<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $etudiant = new Etudiants($db);

    $etudiant->fetch($_GET['id']);

    $birthday = date("Y-m-d", strtotime($etudiant->datnaietu));
    $date_entree = date("Y-m-d", strtotime($etudiant->datentetu));

    // Prévenir tous les cas possibles qu'il y a dans la bdd (elle est un peu mal faite la bdd mais tkt)
    $remarque = $etudiant->remetu == "NULL" || $etudiant->remetu == "null" || $etudiant->remetu == "" ? "Aucune remarque" : $etudiant->remetu;

    $classement = $etudiant->getLeaderboard();
}