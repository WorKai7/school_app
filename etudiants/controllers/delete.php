<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $etudiant = new Etudiants($db);

    $etudiant->fetch($_GET['id']);

    try {
        $etudiant->delete();

        header("Location: index.php?element=etudiants&action=list");
        exit;

    } catch (Exception $e) {
        $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
    }
}
