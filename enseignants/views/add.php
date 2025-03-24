<div class="dtitle w3-container w3-blue">
    Ajouter un nouvel enseignant
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-row">
                <label class="w3-text-blue" for="numens"><b>Numéro Enseignant</b></label>
                <input class="w3-input w3-border" type="number" id="numens" name="numens" placeholder="Ex: 18624625" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="preens"><b>Prénom</b></label><br />
                <input class="w3-input w3-border" type="text" id="preens" name="preens" placeholder="Ex: Rick" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="nomens"><b>Nom</b></label><br />
                <input class="w3-input w3-border" type="text" id="nomens" name="nomens" placeholder="Ex: Astley" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datnaiens"><b>Date de naissance</b></label><br />
                <input class="w3-input w3-border" type="date" id="datnaiens" name="datnaiens" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="adrens"><b>Adresse</b></label><br />
                <input class="w3-input w3-border" type="text" id="adrens" name="adrens" placeholder="Ex: 55 rue du Faubourg-Saint-Honoré" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="cpens"><b>Code postal</b></label><br />
                <input class="w3-input w3-border" type="number" id="cpens" name="cpens" max="99999" placeholder="Ex: 75008" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="vilens"><b>Ville</b></label><br />
                <input class="w3-input w3-border" type="text" id="vilens" name="vilens" placeholder="Ex: Paris" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="telens"><b>N°Téléphone</b></label><br />
                <input class="w3-input w3-border" type="text" id="telens" name="telens" placeholder="Ex: 0328239465" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="datembens"><b>Date d'embauche</b></label><br />
                <input class="w3-input w3-border" type="date" id="datembens" name="datembens" placeholder="Ex: 0328239465" required />
            </div>
            <div class="w3-third">
                <label class="w3-text-blue" for="foncens"><b>Fonction</b></label><br />
                <select class="w3-input w3-border" name="foncens" id="foncens" required>
                    <option value="" disabled selected>Selectionnez une fonction</option>
                    <option value="AGREGE">Agrégé</option>
                    <option value="CERTIFIE">Certifié</option>
                    <option value="MAITRE DE CONFERENCES">Maître de conférences</option>
                    <option value="VACATAIRE">Vacataire</option>
                </select>
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=enseignants&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Envoyer" />

            </div>
        </div>
</form>
