
<?php
ob_start();
?>

<h3>Synopsis</h3>
<p><?= $film['resume_film'] ?></p>

<p>
    <strong>Année de sortie :</strong> <?= $film['annee_film'] ?><br>
    <strong>Realisateur :</strong> <?= $film['prenom_realisateur'] ?> <?= $film['nom_realisateur'] ?><br>
    <strong>Durée :</strong> <?= $film['duree_film'] ?> minutes.<br>
    <strong>Note :</strong>
    <?php
        echo $result;
    ?>

</p>

<h3><strong>Casting</strong></h3>

<ul>
    <?php
        echo $listeCasting;
    ?>
</ul>

<?php

$titre = "Détail de film";
$titre_secondaire = $film['titre_film'];
$contenu = ob_get_clean();
require "view/template.php";

?>