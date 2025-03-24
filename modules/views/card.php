<div class="dtitle w3-container w3-purple">
    Carte module
</div>
<div class="w3-container">
    <div class="w3-card w3-content w3-margin-top">
        <header class="w3-container w3-purple">
            <h1>Module <?= $module->nummod ?></h1>
        </header>

        <div class="w3-container">
            <div class="w3-half">
                <h4><b>Numéro module :</b> <?= $module->nummod ?></h4>
                <h4><b>Coef :</b> <?= $module->coefmod ?></h4>
            </div>
            <div class="w3-half">
                <h4><b>Nom module :</b> <?= $module->nommod ?></h4>
            </div>
        </div>

        <footer class="w3-container w3-gray">
            <a class="w3-button w3-black w3-margin" href="index.php?element=modules&action=list">Retour à la liste</a>
            <a class="w3-button w3-blue-gray w3-margin" href="index.php?element=modules&action=edit&id=<?= $module->nummod ?>">Modifier</a>
            <a class="w3-button w3-red w3-margin" href="#" onclick="document.getElementById(<?= $module->nummod ?>).style.display='block'">Supprimer</a>

            <div class="w3-modal" id="<?= $module->nummod ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $module->nummod ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer la module <?= $module->nummod ?> (<?= $module->nommod ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera toutes les matières de ce module et donc tous les cours de ce module</p>
                        <a class="w3-button w3-blue" href="index.php?element=modules&action=delete&id=<?= $module->nummod ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $module->nummod ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <table class="w3-table w3-centered w3-large w3-margin-top">
        <td class="w3-purple">Classement</td>
        <td class="w3-purple">Numéro étudiant</td>
        <td class="w3-purple">Prénom</td>
        <td class="w3-purple">Nom</td>
        <td class="w3-purple">Moyenne</td>

        <?php for ($i = 0; $i < count($etudiants); $i++) { ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $etudiants[$i]->numetu ?></td>
                <td><?= $etudiants[$i]->prenometu ?></td>
                <td><?= $etudiants[$i]->nometu ?></td>
                <td><?= $notes[$i] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>