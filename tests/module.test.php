<?php
    include "../class/module.class.php";

    $db = require '../lib/mypdo.php';

    $data = array("nummod" => "R3.05",
                  "name" => "Programmation Système",
                  "coef" => "10");

    $mod = new Module($db, $data);
    // $mod->create();
    $mod->adress = "partout";
    // $mod->update();

    $module = Module::find($db, ["nummod" => "R3.01"]);

    var_dump($module);
