<?php
ob_start();
?>

<ul>
    <?php foreach ($acteurs as $acteur) { ?>
        <li>
            <a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["nom_acteur"] ?> <?= $acteur['prenom_acteur']?></a>
        </li>
    <?php } ?>
</ul>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
?>