<?php
ob_start();
?>

<a href="index.php?action=ajouterGenre" class="modif">Ajouter un genre</a>

<ul>
    <?php foreach ($genres as $genre) { ?>
        <li><a href="index.php?action=detailGenre&id=<?= $genre['id_genre'] ?>"><?= $genre['nom_genre'] ?></a></li>
    <?php } ?>
</ul>

<?php
$titre = "Liste des genres de film";
$titre_secondaire = "Liste des genres de film";
$contenu = ob_get_clean();
require "view/template.php";
?>