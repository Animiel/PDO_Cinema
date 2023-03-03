<?php
ob_start();
?>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE DE SORTIE</th>
            <th>REALISATEUR</th>
            <th>DUREE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $film) { ?>
                <tr>
                    <td><a href="detailFilm.php?id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                    <td><?= $film["annee_sortie"] ?></td>
                    <td><?= $film['prenom_realisateur'] ?> <?= $film['nom_realisateur'] ?></td>
                    <td><?= $film['duree_heure'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";

?>