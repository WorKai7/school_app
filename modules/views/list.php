<div class="dtitle w3-container w3-purple">
    Liste des modules
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <tr>
            <td>
                <label class="w3-text-blue" for="nummod"><b>Numéro module</b></label><br />
                <input type="text" id="nummod" name="nummod" placeholder="Ex: 14298000" value="<?= isset($_POST["nummod"]) ? $_POST["nummod"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="nommod"><b>Nom module</b></label><br />
                <input type="text" id="nommod" name="nommod" placeholder="Ex: Développement Web" value="<?= isset($_POST["nommod"]) ? $_POST["nommod"] : "" ?>">
            </td>
            <td>
                <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Filtrer">
            </td>
        </tr>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
    <td class="w3-purple">Numéro module</td>
    <td class="w3-purple">Nom module</td>
    <td class="w3-purple"></td>
    <td class="w3-purple"></td>

    <?php foreach ($modules as $module) { ?>
        <tr>
            <td><a style="color: blue" href="index.php?element=modules&action=card&id=<?= $module->nummod ?>"><?= $module->nummod ?></a></td>
            <td><?= $module->nommod ?></td>

            <td>
                <a class="w3-button w3-blue-gray" href='index.php?element=modules&action=edit&id=<?= $module->nummod ?>'>Modifier</a>
            </td>
            <td>
                <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $module->nummod ?>).style.display='block'">Supprimer</a>
            </td>

            <div class="w3-modal" id="<?= $module->nummod ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $module->nummod ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer le module <?= $module->nummod ?> (<?= $module->nommod ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera toutes les matières de ce module et donc tous les cours de ce module</p>
                        <a class="w3-button w3-blue" href="index.php?element=modules&action=delete&id=<?= $module->nummod ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $module->nummod ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>

        </tr>
    <?php } ?>
</table>