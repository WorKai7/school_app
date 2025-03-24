<div class="dtitle w3-container w3-purple">
    Ajouter un nouveau module
</div>
<form class="w3-container" method="POST">
    <div class="dcontent w3-margin-top">
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <label class="w3-text-blue" for="nummod"><b>Numéro de module</b></label><br />
                <input class="w3-input w3-border" type="text" placeholder="Ex: R3.01" id="nummod" name="nummod" required />
            </div>
            <div class="w3-half">
                <label class="w3-text-blue" for="nommod"><b>Nom de module</b></label><br />
                <input class="w3-input w3-border" type="text" id="nommod" name="nommod" placeholder="Ex: Développement Web" required />
            </div>
            <div class="w3-row">
                <label class="w3-text-blue" for="coefmod"><b>Coefficient</b></label><br />
                <input class="w3-input w3-border" type="number" id="coefmod" name="coefmod" placeholder="Ex: 5" required />
            </div>
        </div>
        <br />
        <div class="w3-row-padding w3-content">
            <div class="w3-half">
                <a href="index.php?element=modules&action=list" class="w3-btn w3-red">Annuler</a>
            </div>
            <div class="w3-half">
                <input class="w3-btn w3-blue-grey" type="submit" name="confirm_envoyer" value="Envoyer" />

            </div>
        </div>
</form>
