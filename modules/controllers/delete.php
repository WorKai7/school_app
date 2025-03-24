<?php
if (isset($_GET['id'])) {
    include dirname(__FILE__) . "/../../class/module.class.php";

    $module = new Module($db);

    $module->fetch($_GET['id']);

    try {
        $module->delete();

        header("Location: index.php?element=modules&action=list");
        exit;

    } catch (Exception $e) {
        $_SESSION['mesgs']['errors'][] = "Message d'erreur: $e";
    }
}
