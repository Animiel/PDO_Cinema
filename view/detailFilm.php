
<?php
ob_start();

$film = $sqlStateFilm->fetch();
$casting = $sqlStateCasting->fetchAll();
?>

<a href="index.php" class='back'>Retour aux films</a>

<h2><strong><?= $film['titre'] ?></strong></h2>

<h3>Synopsis</h3>
<p><?= $film['synopsis'] ?></p>

<p>
    <strong>Année de sortie :</strong> <?= $film['date_sortie_fr'] ?><br>
    <strong>Realisateur :</strong> <?= $film['prenom_realisateur'] ?> <?= $film['nom_realisateur'] ?><br>
    <strong>Durée :</strong> <?= $film['duree'] ?> minutes.<br>
    <strong>Note :</strong>
    <?php
    afficherNote();
    ?>

</p>

<h3><strong>Casting</strong></h3>

<ul>
    <?php
    afficherCasting();
    ?>
</ul>

<?php

$titre = "Détail de film";
$titre_secondaire = $film['titre'];
$contenu = ob_get_clean();
require "view/template.php";

?>