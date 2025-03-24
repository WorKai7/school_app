<?php
    include "../class/matiere.class.php";

    $db = require '../lib/mypdo.php';

    $data = array("nummat" => 14298,
                  "name" => "C++",
                  "coef" => "10",
                  "fk_module" => 2);

    $mat = new Matiere($db, $data);
    // $mat->create();
    $mat->adress = "partout";
    // $mat->update();

    $matiere = Matiere::find($db, ["name" => "PHP"]);

    var_dump($matiere);
