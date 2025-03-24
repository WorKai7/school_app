<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/matiere.class.php";

    $matiere = new Matiere($db);

    $matiere->fetch($_GET['id']);
}

try {
    if (isset($_POST['confirm_envoyer'])) {

        $matiere->old_nummat = $matiere->nummat;
        $matiere->nummat = $_POST["nummat"];
        $matiere->nommat = $_POST["nommat"];
        $matiere->nummod = $_POST["nummod"];
        $matiere->coefmat = $_POST["coefmat"];

        $matiere->update();

        $_SESSION['mesgs']['confirm'][] = "La matière n°" . $matiere->nummat . " (" . $matiere->nommat . ") a bien été modifié dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}