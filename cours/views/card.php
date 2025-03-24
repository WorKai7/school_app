<div class="dtitle w3-container w3-orange">
    Carte cours
</div>
<div class="w3-container">
    <div class="w3-card w3-content w3-margin-top">
        <header class="w3-container w3-orange">
            <h1>Cours n°<?= $_GET["id"] ?></h1>
        </header>

        <div class="w3-container">
            <div class="w3-half">
                <h4><b>Matière :</b> <?= $cours->getMatName() ?></h4>
            </div>
            <div class="w3-half">
                <h4><b>Enseignant :</b> <?= $cours->getEnsName() ?></h4>
            </div>
            <div class="w3-row">
                <h4><b>Année</b> <?= $cours->annee ?></h4>
            </div>
        </div>

        <footer class="w3-container w3-gray">
            <a class="w3-button w3-black w3-margin" href="index.php?element=cours&action=list">Retour à la liste</a>
            <a class="w3-button w3-blue-gray w3-margin" href="index.php?element=cours&action=edit&id=<?= $_GET['id'] ?>">Modifier</a>
            <a class="w3-button w3-red w3-margin" href="#" onclick="document.getElementById(<?= $_GET['id'] ?>).style.display='block'">Supprimer</a>

            <div class="w3-modal" id="<?= $_GET['id'] ?>">
                <div class="w3-modal-content">
                    <header class="w3-container w3-red">
                        <span onclick="document.getElementById(<?= $_GET['id'] ?>).style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <h3>Êtes-vous sûrs de vouloir supprimer le cours de <?= $cours->getMatName() ?> n°<?= $_GET['id'] ?> ?</h3>
                    </header>

                    <div class="w3-container">
                        <p>Cette action est irréversible</p>
                        <a class="w3-button w3-blue" href="index.php?element=cours&action=delete&id=<?= $_GET['id'] ?>">Oui</a>
                        <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $_GET['id'] ?>).style.display='none'">Non</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>