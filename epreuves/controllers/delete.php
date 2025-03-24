<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/epreuve.class.php";

    $epreuve = new Epreuve($db);

    $epreuve->fetch($_GET['id']);

    try {
        $epreuve->delete();

        header("Location: index.php?element=epreuves&action=list");
        exit;

    } catch (Exception $e) {
        $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
    }
}
