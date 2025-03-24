<?php
    include "../class/cours.class.php";

    $db = require '../lib/mypdo.php';

    $data = array("date_debut" => '2024-11-16 22:43:00',
                  "groupe" => '1',
                  "detail_groupe" => "B",
                  "enseignant" => 1234,
                  "matiere" => 1);

    $c = new Cours($db, $data);
    $c->create();
    // $c->update();

    $cours = Cours::find($db, ["groupe" => '1']);

    var_dump($ens);
