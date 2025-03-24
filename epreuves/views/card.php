<div class="dtitle w3-container w3-pink">
    Carte épreuve
</div>
<div class="w3-container">
    <div class="w3-card w3-content w3-margin-top">
        <header class="w3-container w3-pink">
            <h1>Épreuve <?= $epreuve->numepr ?></h1>
        </header>

        <div class="w3-container">
            <div class="w3-half">
                <h4><b>Numéro épreuve :</b> <?= $epreuve->numepr ?></h4>
                <h4><b>Enseignant :</b> <?= $epreuve->getEnsName() ?></h4>
                <h4><b>Date :</b> <?= $epreuve->datepr ?></h4>
            </div>
            <div class="w3-half">
                <h4><b>Nom épreuve :</b> <?= $epreuve->libepr ?></h4>
                <h4><b>Matière :</b> <?= $epreuve->getMatName() ?></h4>
                <h4><b>Année :</b> <?= $epreuve->annepr ?></h4>
            </div>
            <div class="w3-row">
                <h4><b>Coef :</b> <?= $epreuve->coefepr ?></h4>
            </div>
        </div>

        <footer class="w3-container w3-gray">
            <a class="w3-button w3-black w3-margin" href="index.php?element=epreuves&action=list">Retour à la liste</a>
            <a class="w3-button w3-blue-gray w3-margin" href="index.php?element=epreuves&action=edit&id=<?= $epreuve->numepr ?>">Modifier</a>
            <a class="w3-button w3-red w3-margin" href="#" onclick="document.getElementById(<?= $epreuve->numepr ?>).style.display='block'">Supprimer</a>

            <div class="w3-modal" id="<?= $epreuve->numepr ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $epreuve->numepr ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer l'épreuve <?= $epreuve->numepr ?> (<?= $epreuve->libepr ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible</p>
                        <a class="w3-button w3-blue" href="index.php?element=epreuves&action=delete&id=<?= $epreuve->numepr ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $epreuve->numepr ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="dtitle w3-container w3-pink w3-margin-top">
        Classement épreuve n° <?= $epreuve->numepr ?>
    </div>

    <table class="w3-table w3-centered w3-large w3-margin-top">
        <td class="w3-pink">Classement</td>
        <td class="w3-pink">Numéro étudiant</td>
        <td class="w3-pink">Prénom</td>
        <td class="w3-pink">Nom</td>
        <td class="w3-pink">Note</td>

        <?php for ($i = 0; $i < count($etudiants); $i++) { ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $etudiants[$i]->numetu ?></td>
                <td><?= $etudiants[$i]->prenometu ?></td>
                <td><?= $etudiants[$i]->nometu ?></td>
                <td><?= $notes[$i] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>