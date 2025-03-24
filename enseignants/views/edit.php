<div class="dtitle w3-container w3-blue">
    Modifier l'enseignant
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-row">
                <label class="w3-text-blue" for="numens"><b>Numéro Enseignant</b></label>
                <input class="w3-input w3-border" type="text" id="numens" name="numens" placeholder="Ex: 18624625" value="<?= $enseignant->numens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="preens"><b>Prénom</b></label><br />
                <input class="w3-input w3-border" type="text" id="preens" name="preens" placeholder="Ex: Rick" value="<?= $enseignant->preens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="nomens"><b>Nom</b></label><br />
                <input class="w3-input w3-border" type="text" id="nomens" name="nomens" placeholder="Ex: Astley" value="<?= $enseignant->nomens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datnaiens"><b>Date de naissance</b></label><br />
                <input class="w3-input w3-border" type="date" id="datnaiens" name="datnaiens" value="<?= $birthday ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="adrens"><b>Adresse</b></label><br />
                <input class="w3-input w3-border" type="text" id="adrens" name="adrens" placeholder="Ex: 55 rue du Faubourg-Saint-Honoré" value="<?= $enseignant->adrens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="cpens"><b>Code postal</b></label><br />
                <input class="w3-input w3-border" type="number" id="cpens" name="cpens" max="99999" placeholder="Ex: 75008" value="<?= $enseignant->cpens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="vilens"><b>Ville</b></label><br />
                <input class="w3-input w3-border" type="text" id="vilens" name="vilens" placeholder="Ex: Paris" value="<?= $enseignant->vilens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="telens"><b>N°Téléphone</b></label><br />
                <input class="w3-input w3-border" type="text" id="telens" name="telens" placeholder="Ex: 0328239465" value="<?= $enseignant->telens ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datembens"><b>Date d'embauche</b></label><br />
                <input class="w3-input w3-border" type="date" id="datembens" name="datembens" placeholder="Ex: 0328239465" value="<?= $date_embauche ?>" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="foncens"><b>Fonction</b></label><br />
                <select class="w3-input w3-border" name="foncens" id="foncens" required>
                    <option value="AGREGE" <?= $enseignant->foncens == "AGREGE" ? "selected" : "" ?>>Agrégé</option>
                    <option value="CERTIFIE" <?= $enseignant->foncens == "CERTIFIE" ? "selected" : "" ?>>Certifié</option>
                    <option value="MAITRE DE CONFERENCES" <?= $enseignant->foncens == "MAITRE DE CONFERENCES" ? "selected" : "" ?>>Maître de conférences</option>
                    <option value="VACATAIRE" <?= $enseignant->foncens == "VACATAIRE" ? "selected" : "" ?>>Vacataire</option>
                </select>
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=enseignants&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Modifier" />
            </div>
        </div>
</form>
