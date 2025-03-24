<div class="dtitle w3-container w3-green">
    Carte étudiant
</div>
<div class="w3-container">
    <div class="w3-card w3-content w3-margin-top">
        <header class="w3-container w3-green">
            <h1>Étudiant n° <?= $etudiant->numetu ?></h1>
        </header>

        <div class="w3-container">
            <div class="w3-half">
                <h4><b>Prénom :</b> <?= $etudiant->prenometu ?></h4>
                <h4><b>Date de naissance :</b> <?= $birthday ?></h4>
                <h4><b>Adresse :</b> <?= $etudiant->adretu ?></h4>
                <h4><b>Code postal :</b> <?= $etudiant->cpetu ?></h4>
                <h4><b>Année :</b> <?= $etudiant->annetu ?></h4>
            </div>
            <div class="w3-half">
                <h4><b>Nom :</b> <?= $etudiant->nometu ?></h4>
                <h4><b>Sexe :</b> <?= $etudiant->sexetu ?></h4>
                <h4><b>Ville :</b> <?= $etudiant->viletu ?></h4>
                <h4><b>Téléphone :</b> <?= $etudiant->teletu ?></h4>
                <h4><b>Date entrée :</b> <?= $etudiant->datentetu ?></h4>
            </div>
            <div class="w3-row">
                <h4><b>Remarque :</b> <?= $remarque ?></h4>
            </div>
        </div>

        <footer class="w3-container w3-gray">
            <a class="w3-button w3-black w3-margin" href="index.php?element=etudiants&action=list">Retour à la liste</a>
            <a class="w3-button w3-blue-gray w3-margin" href="index.php?element=etudiants&action=edit&id=<?= $etudiant->numetu ?>">Modifier</a>
            <a class="w3-button w3-red w3-margin" href="#" onclick="document.getElementById(<?= $etudiant->numetu ?>).style.display='block'">Supprimer</a>

            <div class="w3-modal" id="<?= $etudiant->numetu ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $etudiant->numetu ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer l'étudiant n°<?= $etudiant->numetu ?> (<?= $etudiant->prenometu ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera l'utilisateur de l'étudiant</p>
                        <a class="w3-button w3-blue" href="index.php?element=etudiants&action=delete&id=<?= $etudiant->numetu ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $etudiant->numetu ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <table class="w3-table w3-centered w3-large w3-margin-top">
        <td class="w3-green">Module</td>
        <td class="w3-green">Moyenne</td>
        <td class="w3-green">Classement dans ce module</td>

        <?php foreach ($classement as $ligne) { ?>
            <tr>
                <td><?= $ligne["nommod"] ?></td>
                <td><?= $ligne["moyenne"] ?></td>
                <td><?= $ligne["classement"] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>