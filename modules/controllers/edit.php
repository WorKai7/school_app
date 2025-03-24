<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/module.class.php";

    $module = new Module($db);

    $module->fetch($_GET['id']);
}

try {
    if (isset($_POST['confirm_envoyer'])) {
        
        $module->old_nummod = $module->nummod;
        $module->nummod = $_POST["nummod"];
        $module->nommod = $_POST["nommod"];
        $module->coefmod = $_POST["coefmod"];

        $module->update();

        $_SESSION['mesgs']['confirm'][] = "Le module" . $module->nummod . " (" . $module->nommod . ") a bien été modifié dans la base de données !";
    }
} catch (Exception $e) {
    $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
}