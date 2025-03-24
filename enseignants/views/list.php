<div class="dtitle w3-container w3-blue">
    Liste d'enseignants
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <tr>
            <td>
                <label class="w3-text-blue" for="numens"><b>Numéro enseignant</b></label><br />
                <input type="text" id="numens" name="numens" placeholder="Ex: 14298000" value="<?= isset($_POST["numens"]) ? $_POST["numens"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="preens"><b>Prénom</b></label><br />
                <input type="text" id="preens" name="preens" placeholder="Ex: Rick" value="<?= isset($_POST["preens"]) ? $_POST["preens"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="nomens"><b>Nom</b></label><br />
                <input type="text" id="nomens" name="nomens" placeholder="Ex: Astley" value="<?= isset($_POST["nomens"]) ? $_POST["nomens"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="foncens"><b>Fonction</b></label><br />
                <input type="text" id="foncens" name="foncens" placeholder="Ex: AGREGE" value="<?= isset($_POST["foncens"]) ? $_POST["foncens"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="vilens"><b>Ville</b></label><br />
                <input type="text" id="vilens" name="vilens" placeholder="Ex: Calais" value="<?= isset($_POST["vilens"]) ? $_POST["vilens"] : "" ?>">
            </td>
            <td>
                <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Filtrer">
            </td>
        </tr>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
<td class="w3-blue">Numéro Enseignant</td>
    <td class="w3-blue">Prénom</td>
    <td class="w3-blue">Nom</td>
    <td class="w3-blue">Fonction</td>
    <td class="w3-blue">Ville</td>
    <td class="w3-blue"></td>
    <td class="w3-blue"></td>

    <?php foreach ($enseignants as $ens) { ?>
        <tr>
            <td><a style="color: blue" href="index.php?element=enseignants&action=card&id=<?= $ens->numens ?>"><?= $ens->numens ?></a></td>
            <td><?= $ens->preens ?></td>
            <td><?= $ens->nomens ?></td>
            <td><?= $ens->foncens ?></td>
            <td><?= $ens->vilens ?></td>
            <td>
                <a class="w3-button w3-blue-gray" href='index.php?element=enseignants&action=edit&id=<?= $ens->numens ?>'>Modifier</a>
            </td>
            <td>
                <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $ens->numens ?>).style.display='block'">Supprimer</a>
            </td>

            <div class="w3-modal" id="<?= $ens->numens ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $ens->numens ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer l'enseignant n°<?= $ens->numens ?> (<?= $ens->preens ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera tous les cours associés à l'enseignant ainsi que son utilisateur</p>
                        <a class="w3-button w3-blue" href="index.php?element=enseignants&action=delete&id=<?= $ens->numens ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $ens->numens ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>

        </tr>
    <?php } ?>
</table>