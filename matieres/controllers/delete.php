<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/matiere.class.php";

    $matiere = new Matiere($db);

    $matiere->fetch($_GET['id']);

    try {
        $matiere->delete();

        $_SESSION['mesgs']['confirm'][] = "La matière n°" . $matiere->nummat . " (" . $matiere->nommat . ") a bien été supprimée de la base de données !";
        header("Location: index.php?element=matieres&action=list");
        exit;

    } catch (Exception $e) {
        $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
    }
}
