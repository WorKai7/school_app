<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/enseignant.class.php";

    $enseignant = new Enseignant($db);

    $enseignant->fetch($_GET['id']);

    $birthday = date("Y-m-d", strtotime($enseignant->datnaiens));
    $date_embauche = date("Y-m-d", strtotime($enseignant->datembens));
}

try {
    if (isset($_POST['confirm_envoyer'])) {
        $enseignant->old_numens = $enseignant->numens;
        $enseignant->numens = $_POST['numens'];
        $enseignant->preens = $_POST['preens'];
        $enseignant->nomens = $_POST['nomens'];
        $enseignant->datnaiens = $_POST['datnaiens'];
        $enseignant->adrens = $_POST['adrens'];
        $enseignant->cpens = $_POST['cpens'];
        $enseignant->vilens = $_POST['vilens'];
        $enseignant->telens = $_POST['telens'];
        $enseignant->foncens = $_POST['foncens'];
        $enseignant->datembens = $_POST['datembens'];

        $enseignant->update();

        $_SESSION['mesgs']['confirm'][] = "L'enseignant n°" . $enseignant->numens . " (" . $enseignant->preens . ") a bien été modifié dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}