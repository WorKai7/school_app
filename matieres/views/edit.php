<div class="dtitle w3-container w3-red">
    Modifier la matière
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <label class="w3-text-blue" for="nummat"><b>Numéro de matière</b></label>
                <input class="w3-input w3-border" type="number" id="nummat" name="nummat" value="<?= $matiere->nummat ?>" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="nommat"><b>Nom de matière</b></label><br />
                <input class="w3-input w3-border" type="text" id="nommat" name="nommat" placeholder="Ex: Python" value="<?= $matiere->nommat ?>" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="coefmat"><b>Coefficient</b></label><br />
                <input class="w3-input w3-border" type="number" id="coefmat" name="coefmat" placeholder="Ex: 5" value="<?= $matiere->coefmat ?>" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="nummod"><b>Module</b></label><br />
                <select class="w3-input w3-border" id="nummod" name="nummod" required>
                    <option value="" disabled selected>Sélectionner un module</option>
                    <?php
                        foreach (Matiere::getMod($db) as $mod) {
                            $selected = ($matiere->nummod == $mod["nummod"]) ? "selected" : "";
                            echo "<option value='" . $mod['nummod'] . "' $selected>" . $mod['nummod'] . " - " . $mod['nommod'] . "</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=matieres&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Modifier" />
            </div>
        </div>
</form>
