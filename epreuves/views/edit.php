<div class="dtitle w3-container w3-pink">
    Modifier l'épreuve
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <label class="w3-text-blue" for="numepr"><b>Numéro d'épreuve</b></label>
                <input class="w3-input w3-border" type="number" id="numepr" name="numepr" placeholder="Ex: 1" value="<?= $epreuve->numepr ?>" />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="libepr"><b>Nom de l'épreuve</b></label><br />
                <input class="w3-input w3-border" type="text" id="libepr" name="libepr" placeholder="Ex: Interro anglais" value="<?= $epreuve->libepr ?>" />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="ensepr"><b>Enseignant</b></label><br />
                <select class="w3-input w3-border" id="ensepr" name="ensepr">
                    <option value="" disabled selected>Sélectionner un enseignant</option>
                    <?php
                        foreach (Epreuve::getEns($db) as $ens) {
                            $selected = $epreuve->ensepr == $ens["numens"] ? "selected" : "";
                            echo "<option value='" . $ens['numens'] . "' $selected>" . $ens['preens'] . " " . $ens['nomens'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="matepr"><b>Matière</b></label><br />
                <select class="w3-input w3-border" id="matepr" name="matepr">
                    <option value="" disabled selected>Sélectionner une matiere</option>
                    <?php
                        foreach (Epreuve::getMat($db) as $mat) {
                            $selected = $epreuve->matepr == $mat["nummat"] ? "selected" : "";
                            echo "<option value='" . $mat['nummat'] . "' $selected>" . $mat['nommat'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="annepr"><b>Année</b></label><br />
                <select class="w3-input w3-border" name="annepr" id="annepr">
                    <option value="" disabled selected>Sélectionner une année</option>
                    <option value="1" <?= $epreuve->annepr == 1 ? "selected" : "" ?>>1</option>
                    <option value="2" <?= $epreuve->annepr == 2 ? "selected" : "" ?>>2</option>
                </select>
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datepr"><b>Date de l'épreuve</b></label><br />
                <input class="w3-input w3-border" type="date" id="datepr" name="datepr" value="<?= $epreuve->datepr ?>" />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="coefepr"><b>Coef</b></label><br />
                <input class="w3-input w3-border" type="number" id="coefepr" name="coefepr" placeholder="Ex: 5" value="<?= $epreuve->coefepr ?>" />
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=epreuves&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Modifier" />
            </div>
        </div>
</form>
