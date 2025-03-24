<div class="dtitle w3-container w3-red">
    Carte matière
</div>
<div class="w3-container">
    <div class="w3-card w3-content w3-margin-top">
        <header class="w3-container w3-red">
            <h1>Matière n° <?= $matiere->nummat ?></h1>
        </header>

        <div class="w3-container">
            <div class="w3-half">
                <h4><b>Numéro matière :</b> <?= $matiere->nummat ?></h4>
                <h4><b>Module :</b> <?= $matiere->getModName() ?></h4>
            </div>
            <div class="w3-half">
                <h4><b>Coef :</b> <?= $matiere->coefmat ?></h4>
                <h4><b>Nom matière :</b> <?= $matiere->nommat ?></h4>
            </div>
        </div>

        <footer class="w3-container w3-gray">
            <a class="w3-button w3-black w3-margin" href="index.php?element=matieres&action=list">Retour à la liste</a>
            <a class="w3-button w3-blue-gray w3-margin" href="index.php?element=matieres&action=edit&id=<?= $matiere->nummat ?>">Modifier</a>
            <a class="w3-button w3-red w3-margin" href="#" onclick="document.getElementById(<?= $matiere->nummat ?>).style.display='block'">Supprimer</a>

            <div class="w3-modal" id="<?= $matiere->nummat ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $matiere->nummat ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer la matière n°<?= $matiere->nummat ?> (<?= $matiere->nommat ?>) ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible et supprimera tous les cours de cette matière</p>
                        <a class="w3-button w3-blue" href="index.php?element=matieres&action=delete&id=<?= $matiere->nummat ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $matiere->nummat ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <table class="w3-table w3-centered w3-large w3-margin-top">
        <td class="w3-red">Classement</td>
        <td class="w3-red">Numéro étudiant</td>
        <td class="w3-red">Prénom</td>
        <td class="w3-red">Nom</td>
        <td class="w3-red">Moyenne</td>

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