<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/enseignant.class.php";

    $enseignant = new Enseignant($db);

    $enseignant->fetch($_GET['id']);

    try {
        $enseignant->delete();

        header("Location: index.php?element=enseignants&action=list");
        exit;

    } catch (Exception $e) {
        $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
    }
}
