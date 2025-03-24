<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/enseignant.class.php";

    $enseignant = new Enseignant($db);

    $enseignant->fetch($_GET['id']);

    $birthday = date("Y-m-d", strtotime($enseignant->datnaiens));
    $date_embauche = date("Y-m-d", strtotime($enseignant->datembens));
}