<div class="dtitle w3-container w3-green">
    Accueil étudiants
</div>
<header class="w3-container w3-margin-top w3-green">
    <h1>Bienvenue sur le portail étudiants</h1>
</header>
<div class="w3-container">
    <p>Ou souhaitez-vous aller ?</p>
    <a class="w3-button w3-blue-gray" href="index.php?element=etudiants&action=list">Liste d'étudiants</a>
    <a class="w3-button w3-blue-gray" href="index.php?element=etudiants&action=add">Ajouter un étudiant</a>
</div>

<div class="dtitle w3-container w3-green" style="margin-top: 25px;">
    Classement général des étudiants par modules et par année
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <td>
            <label class="w3-text-blue" for="annetu"><b>Année</b></label><br />
            <select class="w3-input w3-border" id="annetu" name="annetu">
                <option value="" selected>Sélectionnez une année</option>
                <option value="1" <?= isset($_POST["annetu"]) && $_POST["annetu"] == 1 ? "selected" : "" ?>>1</option>
                <option value="2" <?= isset($_POST["annetu"]) && $_POST["annetu"] == 2 ? "selected" : "" ?>>2</option>
            </select>
        </td>
        <td>
            <label class="w3-text-blue" for="nummod"><b>Module</b></label><br />
            <select class="w3-input w3-border" id="nummod" name="nummod">
                <?php
                    foreach (Etudiants::getMod($db) as $mod) {
                        $selected = isset($_POST["nummod"]) && $_POST["nummod"] == $mod["nummod"] ? "selected" : "";
                        echo "<option value='" . $mod['nummod'] . "' $selected>" . $mod['nummod'] . " - " . $mod['nommod'] . "</option>";
                    }
                ?>
            </select>
        </td>
        <td>
            <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Rechercher">
        </td>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
        <td class="w3-green">Classement</td>
        <td class="w3-green">Numéro étudiant</td>
        <td class="w3-green">Prénom</td>
        <td class="w3-green">Nom</td>
        <td class="w3-green">Moyenne</td>

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