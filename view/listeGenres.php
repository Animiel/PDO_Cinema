<?php
ob_start();
?>

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