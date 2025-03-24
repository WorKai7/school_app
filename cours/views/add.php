<div class="dtitle w3-container w3-orange">
    Ajouter un nouveau cours
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <label class="w3-text-blue" for="numens"><b>Enseignant</b></label><br />
                <select class="w3-input w3-border" id="numens" name="numens" required>
                    <option value="" disabled selected>Sélectionner un enseignant</option>
                    <?php
                        foreach (Cours::getEns($db) as $ens) {
                            echo "<option value='" . $ens['numens'] . "'>" . $ens['preens'] . " " . $ens['nomens'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="nummat"><b>Matière</b></label><br />
                <select class="w3-input w3-border" id="nummat" name="nummat" required>
                    <option value="" disabled selected>Sélectionner une matiere</option>
                    <?php
                        foreach (Cours::getMat($db) as $mat) {
                            echo "<option value='" . $mat['nummat'] . "'>" . $mat['nommat'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="w3-row">
                <label class="w3-text-blue" for="annee"><b>Année</b></label><br />
                <select class="w3-input w3-border" name="annee" id="annee">
                    <option value="" disabled selected>Sélectionner une année</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=cours&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Envoyer" />

            </div>
        </div>
</form>
