<div class="dtitle w3-container w3-pink">
    Ajouter une nouvelle épreuve
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <label class="w3-text-blue" for="numepr"><b>Numéro d'épreuve</b></label><br />
                <input class="w3-input w3-border" type="number" placeholder="Ex: 1" id="numepr" name="numepr" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="libepr"><b>Nom de l'épreuve</b></label><br />
                <input class="w3-input w3-border" type="text" id="libepr" name="libepr" placeholder="Ex: Interro anglais" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="ensepr"><b>Enseignant</b></label><br />
                <select class="w3-input w3-border" id="ensepr" name="ensepr" required>
                    <option value="" disabled selected>Sélectionner un enseignant</option>
                    <?php
                        foreach (Epreuve::getEns($db) as $ens) {
                            echo "<option value='" . $ens['numens'] . "'>" . $ens['preens'] . " " . $ens['nomens'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="matepr"><b>Matière</b></label><br />
                <select class="w3-input w3-border" id="matepr" name="matepr" required>
                    <option value="" disabled selected>Sélectionner une matiere</option>
                    <?php
                        foreach (Epreuve::getMat($db) as $mat) {
                            echo "<option value='" . $mat['nummat'] . "'>" . $mat['nommat'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="annepr"><b>Année</b></label><br />
                <select class="w3-input w3-border" name="annepr" id="annepr" required>
                    <option value="" disabled selected>Sélectionner une année</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datepr"><b>Date de l'épreuve</b></label><br />
                <input class="w3-input w3-border" type="date" id="datepr" name="datepr" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="coefepr"><b>Coef</b></label><br />
                <input class="w3-input w3-border" type="number" id="coefepr" name="coefepr" placeholder="Ex: 5" required />
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=epreuves&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Envoyer" />

            </div>
        </div>
</form>
