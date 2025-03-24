<div class="dtitle w3-container w3-green">
    Modifier l'étudiant
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-row">
                <label class="w3-text-blue" for="numetu"><b>Numéro Étudiant</b></label>
                <input class="w3-input w3-border" type="text" id="numetu" name="numetu" placeholder="Ex: 18624625" value="<?= $etudiant->numetu ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="prenometu"><b>Prénom</b></label><br />
                <input class="w3-input w3-border" type="text" id="prenometu" name="prenometu" placeholder="Ex: Rick" value="<?= $etudiant->prenometu ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="nometu"><b>Nom</b></label><br />
                <input class="w3-input w3-border" type="text" id="nometu" name="nometu" placeholder="Ex: Astley" value="<?= $etudiant->nometu ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datnaietu"><b>Date de naissance</b></label><br />
                <input class="w3-input w3-border" type="date" id="datnaietu" name="datnaietu" value="<?= $birthday ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="adretu"><b>Adresse</b></label><br />
                <input class="w3-input w3-border" type="text" id="adretu" name="adretu" placeholder="Ex: 55 rue du Faubourg-Saint-Honoré" value="<?= $etudiant->adretu ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="cpetu"><b>Code postal</b></label><br />
                <input class="w3-input w3-border" type="number" id="cpetu" name="cpetu" max="99999" placeholder="Ex: 75008" value="<?= $etudiant->cpetu ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="viletu"><b>Ville</b></label><br />
                <input class="w3-input w3-border" type="text" id="viletu" name="viletu" placeholder="Ex: Paris" value="<?= $etudiant->viletu ?>" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="annetu"><b>Année</b></label><br />
                <select class="w3-input w3-border" name="annetu" id="annetu" required>
                    <option value="1" <?= $etudiant->annetu == 1 ? "selected" : "" ?>>1</option>
                    <option value="2" <?= $etudiant->annetu == 2 ? "selected" : "" ?>>2</option>
                </select>
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="datentetu"><b>Date d'entrée</b></label><br />
                <input class="w3-input w3-border" type="date" id="datentetu" name="datentetu" value="<?= $date_entree ?>" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="teletu"><b>N°Téléphone</b></label><br />
                <input class="w3-input w3-border" type="text" id="teletu" name="teletu" minlength="10" maxlength="10" placeholder="Ex: 0328672538" value="<?= $etudiant->teletu ?>" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="sexetu"><b>Sexe</b></label><br />
                <select class="w3-input w3-border" name="sexetu" id="sexetu" required>
                    <option value="M" <?= $etudiant->sexetu == "M" ? "selected" : "" ?>>Homme</option>
                    <option value="F" <?= $etudiant->sexetu == "F" ? "selected" : "" ?>>Femme</option>
                </select>
            </div>
            <div class="w3-row">
                <label class="w3-text-blue" for="remetu"><b>Remarque</b></label><br />
                <textarea class="w3-input w3-border" name="remetu" id="remetu" placeholder="Ex: L'étudiant à jeté son camarade par la fenêtre" rows="4"><?= $remarque ?></textarea>
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=etudiants&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Modifier" />

            </div>
        </div>
</form>
