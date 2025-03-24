<div class="dtitle w3-container w3-red">
    Liste des matières
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <tr>
            <td>
                <label class="w3-text-blue" for="nummat"><b>Numéro matière</b></label><br />
                <input type="text" id="nummat" name="nummat" placeholder="Ex: 14298000" value="<?= isset($_POST["nummat"]) ? $_POST["nummat"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="nummod"><b>Module</b></label><br />
                <select class="w3-input w3-border" id="nummod" name="nummod">
                    <option value="" <?= !isset($_POST["nummod"]) ? "selected" : ""; ?>>Aucun</option>
                    <?php
                        foreach (Matiere::getMod($db) as $mod) {
                            $selected = isset($_POST["nummod"]) && $_POST["nummod"] == $mod["nummod"] ? "selected" : "";
                            echo "<option value='" . $mod['nummod'] . "'" . $selected . ">" . $mod['nummod'] . " - " . $mod['nommod'] . "</option>";
                        }
                    ?>
                </select>
            </td>
            <td>
                <label class="w3-text-blue" for="nommat"><b>Nom matière</b></label><br />
                <input type="text" id="nommat" name="nommat" placeholder="Ex: Java" value="<?= isset($_POST["nommat"]) ? $_POST["nommat"] : "" ?>">
            </td>
            <td>
                <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Filtrer">
            </td>
        </tr>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
    <td class="w3-red">Numéro matière</td>
    <td class="w3-red">Module</td>
    <td class="w3-red">Nom matière</td>
    <td class="w3-red"></td>
    <td class="w3-red"></td>

    <?php foreach ($matieres as $matiere) { ?>
        <tr>
            <td><a style="color: blue" href="index.php?element=matieres&action=card&id=<?= $matiere->nummat ?>"><?= $matiere->nummat ?></a></td>
            <td><?= $matiere->getModName() ?></td>
            <td><?= $matiere->nommat ?></td>

            <td>
                <a class="w3-button w3-blue-gray" href='index.php?element=matieres&action=edit&id=<?= $matiere->nummat ?>'>Modifier</a>
            </td>
            <td>
                <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $matiere->nummat ?>).style.display='block'">Supprimer</a>
            </td>

            <div class="w3-modal" id="<?= $matiere->nummat ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $matiere->nummat ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer la matière n°<?= $matiere->nummat ?> (<?= $matiere->nommat ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera tous les cours de cette matière</p>
                        <a class="w3-button w3-blue" href="index.php?element=matieres&action=delete&id=<?= $matiere->nummat ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $matiere->nummat ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>

        </tr>
    <?php } ?>
</table>