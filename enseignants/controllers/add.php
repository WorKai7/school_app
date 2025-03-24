<?php

include dirname(__FILE__) . "/../../class/enseignant.class.php";

try {
  if (isset($_POST["confirm_envoyer"])) {

    $data = array(
      "numens" => $_POST["numens"],
      "preens" => $_POST["preens"],
      "nomens" => $_POST["nomens"],
      "datnaiens" => explode("-", $_POST["datnaiens"])[0] <= 9999 ? $_POST["datnaiens"] : date("Y-m-d"),
      "adrens" => $_POST["adrens"],
      "cpens" => $_POST["cpens"],
      "vilens" => $_POST["vilens"],
      "telens" => $_POST["telens"],
      "foncens" => $_POST["foncens"],
      "datembens" => explode("-", $_POST["datembens"])[0] <= 9999 ? $_POST["datembens"] : date("Y-m-d")
    );


    $ens = new Enseignant($db, $data);
    $ens->create();

    $_SESSION['mesgs']['confirm'][] = "L'enseignant n°" . $_POST["numetu"] . " (" . $_POST["preens"] . ") a bien été inséré dans la base de données !";
  }
} catch (Exception $e) {
  if ($e->getCode() == 23000) {
    $err = "Le numéro enseignant que vous venez d'entrer est probablement déjà associé à un utilisateur, peut-être que vous avez déjà inséré cet enseignant auparavant";
  } else {
    $err = '';
  }
  $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e, $err";
}