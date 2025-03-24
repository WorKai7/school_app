<?php

include dirname(__FILE__) . "/../../class/etudiant.class.php";

try {
  if (isset($_POST["confirm_envoyer"])) {

    $data = array(
      "numetu" => $_POST["numetu"],
      "prenometu" => $_POST["prenometu"],
      "nometu" => $_POST["nometu"],
      "datnaietu" => explode("-", $_POST["datnaietu"])[0] <= 9999 ? $_POST["datnaietu"] : date("Y-m-d"),
      "adretu" => $_POST["adretu"],
      "annetu" => $_POST["annetu"],
      "cpetu" => $_POST["cpetu"],
      "viletu" => $_POST["viletu"],
      "teletu" => $_POST["teletu"],
      "datentetu" => explode("-", $_POST["datentetu"])[0] <= 9999 ? $_POST["datentetu"] : date("Y-m-d"),
      "sexetu" => $_POST["sexetu"],
      "remetu" => $_POST["remetu"]
    );

    $etu = new Etudiants($db, $data);
    $etu->create();

    $_SESSION['mesgs']['confirm'][] = "L'étudiant n°" . $_POST["numetu"] . " (" . $_POST["prenometu"] . ") a bien été inséré dans la base de données !";
  }
} catch (Exception $e) {
  if ($e->getCode() == 23000) {
    $err = "Le numéro étudiant que vous venez d'entrer est probablement déjà associé à un utilisateur, peut-être que vous avez déjà inséré cet étudiant auparavant";
  } else {
    $err = '';
  }
  $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e, $err";
}