<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/etudiant.class.php";

    $etudiant = new Etudiants($db);

    $etudiant->fetch($_GET['id']);

    $birthday = date("Y-m-d", strtotime($etudiant->datnaietu));
    $date_entree = date("Y-m-d", strtotime($etudiant->datentetu));

    $remarque = $etudiant->remetu == "NULL" || $etudiant->remetu == "null" || $etudiant->remetu == "" ? "" : $etudiant->remetu;
}

try {
    if (isset($_POST['confirm_envoyer'])) {

        $etudiant->old_numetu = $etudiant->numetu;
        $etudiant->numetu = $_POST['numetu'];
        $etudiant->prenometu = $_POST['prenometu'];
        $etudiant->nometu = $_POST['nometu'];
        $etudiant->datnaietu = $_POST['datnaietu'];
        $etudiant->adretu = $_POST['adretu'];
        $etudiant->annetu = $_POST['annetu'];
        $etudiant->cpetu = $_POST['cpetu'];
        $etudiant->viletu = $_POST['viletu'];
        $etudiant->teletu = $_POST['teletu'];
        $etudiant->datentetu = $_POST['datentetu'];
        $etudiant->sexetu = $_POST['sexetu'];
        $etudiant->remetu = $_POST["remetu"] ?? null;

        $etudiant->update();

        $_SESSION['mesgs']['confirm'][] = "L'étudiant n°" . $etudiant->numetu . " (" . $etudiant->prenometu . ") a bien été modifié dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}