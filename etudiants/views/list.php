<div class="dtitle w3-container w3-green">
    Liste d'étudiants
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <tr>
            <td>
                <label class="w3-text-blue" for="numetu"><b>Numéro étudiant</b></label><br />
                <input type="text" id="numetu" name="numetu" placeholder="Ex: 14298000" value="<?= isset($_POST["numetu"]) ? $_POST["numetu"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="prenometu"><b>Prénom</b></label><br />
                <input type="text" id="prenometu" name="prenometu" placeholder="Ex: Rick" value="<?= isset($_POST["prenometu"]) ? $_POST["prenometu"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="nometu"><b>Nom</b></label><br />
                <input type="text" id="nometu" name="nometu" placeholder="Ex: Astley" value="<?= isset($_POST["nometu"]) ? $_POST["nometu"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="annetu"><b>Année</b></label><br />
                <input type="text" id="annetu" name="annetu" placeholder="Ex: 1" value="<?= isset($_POST["annetu"]) ? $_POST["annetu"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="viletu"><b>Ville</b></label><br />
                <input type="text" id="viletu" name="viletu" placeholder="Ex: Looberghe" value="<?= isset($_POST["viletu"]) ? $_POST["viletu"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="sexetu"><b>Sexe</b></label><br />
                <select class="w3-input w3-border" id="sexetu" name="sexetu">
                    <option value=""<?= !isset($_POST["sexetu"]) ? "selected" : "" ?>>Aucun</option>
                    <option value="M"<?= isset($_POST["sexetu"]) && $_POST["sexetu"] == 'M' ? "selected" : "" ?>>Homme</option>
                    <option value="F"<?= isset($_POST["sexetu"]) && $_POST["sexetu"] == 'F' ? "selected" : "" ?>>Femme</option>
                </select>
            </td>
            <td>
                <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Filtrer">
            </td>
        </tr>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
    <td class="w3-green">Numéro Étudiant</td>
    <td class="w3-green">Prénom</td>
    <td class="w3-green">Nom</td>
    <td class="w3-green">Année</td>
    <td class="w3-green">Ville</td>
    <td class="w3-green">Sexe</td>
    <td class="w3-green"></td>
    <td class="w3-green"></td>

    <?php foreach ($etudiants as $etu) { ?>
        <tr>
            <td><a style="color: blue" href="index.php?element=etudiants&action=card&id=<?= $etu->numetu ?>"><?= $etu->numetu ?></a></td>
            <td><?= $etu->prenometu ?></td>
            <td><?= $etu->nometu ?></td>
            <td><?= $etu->annetu ?></td>
            <td><?= $etu->viletu ?></td>
            <td><?= $etu->sexetu ?></td>

            <td>
                <a class="w3-button w3-blue-gray" href='index.php?element=etudiants&action=edit&id=<?= $etu->numetu ?>'>Modifier</a>
            </td>
            <td>
                <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $etu->numetu ?>).style.display='block'">Supprimer</a>
            </td>

            <div class="w3-modal" id="<?= $etu->numetu ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $etu->numetu ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer l'étudiant n°<?= $etu->numetu ?> (<?= $etu->prenometu ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera l'utilisateur de l'étudiant</p>
                        <a class="w3-button w3-blue" href="index.php?element=etudiants&action=delete&id=<?= $etu->numetu ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $etu->numetu ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>

        </tr>
    <?php } ?>
</table>