<div class="dtitle w3-container w3-blue">
    Carte enseignant
</div>
<div class="w3-container">
    <div class="w3-card w3-content w3-margin-top">
        <header class="w3-container w3-blue">
            <h1>Enseignant n° <?= $enseignant->numens ?></h1>
        </header>

        <div class="w3-container">
            <div class="w3-half">
                <h4><b>Prénom :</b> <?= $enseignant->preens ?></h4>
                <h4><b>Date de naissance :</b> <?= $birthday ?></h4>
                <h4><b>Code postal :</b> <?= $enseignant->cpens ?></h4>
                <h4><b>Téléphone :</b> <?= $enseignant->telens ?></h4>
            </div>
            <div class="w3-half">
                <h4><b>Nom :</b> <?= $enseignant->nomens ?></h4>
                <h4><b>Adresse :</b> <?= $enseignant->adrens ?></h4>
                <h4><b>Ville :</b> <?= $enseignant->vilens ?></h4>
                <h4><b>Fonction :</b> <?= $enseignant->foncens ?></h4>
            </div>
            <div class="w3-row">
                <h4><b>Date d'embauche</b> <?= $date_embauche ?></h4>
            </div>
        </div>

        <footer class="w3-container w3-gray">
            <a class="w3-button w3-black w3-margin" href="index.php?element=enseignants&action=list">Retour à la liste</a>
            <a class="w3-button w3-blue-gray w3-margin" href="index.php?element=enseignants&action=edit&id=<?= $enseignant->numens ?>">Modifier</a>
            <a class="w3-button w3-red w3-margin" href="#" onclick="document.getElementById(<?= $enseignant->numens ?>).style.display='block'">Supprimer</a>

            <div class="w3-modal" id="<?= $enseignant->numens ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $enseignant->numens ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer l'enseignant n°<?= $enseignant->numens ?> (<?= $enseignant->preens ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera l'utilisateur de l'enseignant</p>
                        <a class="w3-button w3-blue" href="index.php?element=enseignants&action=delete&id=<?= $enseignant->numens ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $enseignant->numens ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>