<?php
    include "../class/etudiant.class.php";

    $db = require '../lib/mypdo.php';

    $data = array("numetu" => 14298,
                  "firstname" => "Jérôme",
                  "lastname" => "Vandewalle",
                  "birthday" => "06/04/2005",
                  "diploma" => "BUT",
                  "year" => 2,
                  "td" => 1,
                  "tp" => "B",
                  "adress" => "qq part",
                  "zipcode" => 59630,
                  "town" => "Looberghe",
                  "fk_user" => 2000);

    $moi = new Etudiants($db, $data);
    // $moi->create();
    $moi->adress = "partout";
    // $moi->update();

    $etu = Etudiants::find($db, ["diploma" => "BUT", "tp" => "B"]);

    var_dump($etu);
