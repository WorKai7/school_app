<?php
    include "../class/enseignant.class.php";

    $db = require '../lib/mypdo.php';

    $data = array("numens" => 14298,
                  "firstname" => "Jérôme",
                  "lastname" => "Vandewalle",
                  "birthday" => "06/04/2005",
                  "adress" => "qq part",
                  "zipcode" => 59630,
                  "town" => "Looberghe",
                  "fk_user" => 500);

    $moi = new Enseignant($db, $data);
    // $moi->create();
    $moi->adress = "partout";
    // $moi->update();

    $ens = Enseignant::find($db, ["adress" => "Quelque part", "town" => "Quelque part"]);

    var_dump($ens);
