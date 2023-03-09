<?php
ob_start();
?>

<a href="index.php?action=ajouterRealisateur" class="modif">Ajouter un réalisateur</a>

<ul>
    <?php foreach ($listeReals as $real) { ?>
        <li>
            <a href="index.php?action=detailRealisateur&id=<?= $real['id_realisateur'] ?>"><?= $real['nom_realisateur'] ?> <?= $real['prenom_realisateur'] ?></a>
        </li>
    <?php } ?>
</ul>

<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
?>