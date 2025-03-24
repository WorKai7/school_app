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

try {
    if (isset($_POST['confirm_envoyer'])) {
        $cours->old_numens = $cours->numens;
        $cours->old_nummat = $cours->nummat;
        $cours->old_annee = $cours->annee;

        $cours->numens = $_POST['numens'];
        $cours->nummat = $_POST['nummat'];
        $cours->annee = $_POST['annee'];

        $cours->update();

        $_SESSION['mesgs']['confirm'][] = "Le cours de " . $cours->getMatName() . " a bien été modifié dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}