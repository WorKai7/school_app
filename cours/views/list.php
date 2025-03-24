<div class="dtitle w3-container w3-orange">
    Liste des cours
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <tr>
            <td>
                <label class="w3-text-blue" for="nummat"><b>Matière</b></label><br />
                <select class="w3-input w3-border" id="nummat" name="nummat">
                    <option value=""<?= !isset($_POST["nummat"]) ? "selected" : "" ?>>Aucun</option>
                    <?php
                        foreach (Cours::getMat($db) as $mat) {
                            $selected = isset($_POST["nummat"]) && $_POST["nummat"] == $mat["nummat"] ? "selected" : "";
                            echo "<option value='" . $mat['nummat'] . "'" . $selected . ">" . $mat['nommat'] . "</option>";
                        }
                    ?>
                </select>
            </td>
            <td>
                <label class="w3-text-blue" for="numens"><b>Enseignant</b></label><br />
                <select class="w3-input w3-border" id="numens" name="numens">
                    <option value=""<?= !isset($_POST["numens"]) ? "selected" : "" ?>>Aucun</option>
                    <?php
                        foreach (Cours::getEns($db) as $ens) {
                            $selected = isset($_POST["numens"]) && $_POST["numens"] == $ens["numens"] ? "selected" : "";
                            echo "<option value='" . $ens['numens'] . "'" . $selected . ">" . $ens['preens'] . " " . $ens['nomens'] . "</option>";
                        }
                    ?>
                </select>
            </td>
            <td>
                <label class="w3-text-blue" for="annee"><b>Annee</b></label><br />
                <select class="w3-input w3-border" id="annee" name="annee">
                    <option value=""<?= !isset($_POST["annee"]) ? "selected" : "" ?>>Aucun</option>
                    <option value="1"<?= isset($_POST["annee"]) && $_POST["annee"] == 1 ? "selected" : "" ?>>1</option>
                    <option value="2"<?= isset($_POST["annee"]) && $_POST["annee"] == 2 ? "selected" : "" ?>>2</option>
                </select>
            </td>
            <td>
                <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Filtrer">
            </td>
        </tr>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
    <td class="w3-orange">Matière</td>
    <td class="w3-orange">Enseignant</td>
    <td class="w3-orange">Annee</td>
    <td class="w3-orange"></td>
    <td class="w3-orange"></td>

    <?php
        foreach ($cours_list as $cours) {
            $cle_primaire = $cours->numens . "-" . $cours->nummat . "-" . $cours->annee;
    ?>
        <tr>
            <td><a style="color: blue" href="index.php?element=cours&action=card&id=<?= $cle_primaire ?>"><?= $cours->getMatName() ?></a></td>
            <td><?= $cours->getEnsName() ?></td>
            <td><?= $cours->annee ?></td>

            <td>
                <a class="w3-button w3-blue-gray" href='index.php?element=cours&action=edit&id=<?= $cle_primaire ?>'>Modifier</a>
            </td>
            <td>
                <a class="w3-button w3-red" href="#" onclick="document.getElementById('<?= $cle_primaire ?>').style.display='block'">Supprimer</a>
            </td>

            <div class="w3-modal" id="<?= $cle_primaire ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById('<?= $cle_primaire ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer le cours de <?= $cours->getMatName() ?> ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible</p>
                        <a class="w3-button w3-blue" href="index.php?element=cours&action=delete&id=<?= $cle_primaire ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById('<?= $cle_primaire ?>').style.display='none'">Non</a>
                    </div>
                </div>
            </div>

        </tr>
    <?php } ?>
</table>