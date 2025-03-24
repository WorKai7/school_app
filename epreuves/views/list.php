<div class="dtitle w3-container w3-pink">
    Liste des epreuves
</div>

<form class="w3-container w3-margin" style="border: none" method="POST">
    <table class="w3-table w3-centered w3-large" style="border: none">
        <tr>
            <td>
                <label class="w3-text-blue" for="libepr"><b>Nom épreuve</b></label><br />
                <input type="text" id="libepr" name="libepr" placeholder="Ex: 14298000" value="<?= isset($_POST["libepr"]) ? $_POST["libepr"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="datepr"><b>Date épreuve</b></label><br />
                <input type="date" id="datepr" name="datepr" value="<?= isset($_POST["datepr"]) ? $_POST["datepr"] : "" ?>">
            </td>
            <td>
                <label class="w3-text-blue" for="annepr"><b>Année</b></label><br />
                <input type="text" id="annepr" name="annepr" placeholder="Ex: 1" value="<?= isset($_POST["annepr"]) ? $_POST["annepr"] : "" ?>">
            </td>
            <td>
                <input class="w3-button w3-blue-gray w3-margin-top" type="submit" name="confirm_envoyer" value="Filtrer">
            </td>
        </tr>
    </table>
</form>

<table class="w3-table w3-centered w3-large w3-margin-top">
    <td class="w3-pink">Nom épreuve</td>
    <td class="w3-pink">Date épreuve</td>
    <td class="w3-pink">Année</td>
    <td class="w3-pink"></td>
    <td class="w3-pink"></td>

    <?php foreach ($epreuves as $epreuve) { ?>
        <tr>
            <td><a style="color: blue" href="index.php?element=epreuves&action=card&id=<?= $epreuve->numepr ?>"><?= $epreuve->libepr ?></a></td>
            <td><?= $epreuve->datepr ?></td>
            <td><?= $epreuve->annepr ?></td>

            <td>
                <a class="w3-button w3-blue-gray" href='index.php?element=epreuves&action=edit&id=<?= $epreuve->numepr ?>'>Modifier</a>
            </td>
            <td>
                <a class="w3-button w3-red" href="#" onclick="document.getElementById(<?= $epreuve->numepr ?>).style.display='block'">Supprimer</a>
            </td>

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

        </tr>
    <?php } ?>
</table>