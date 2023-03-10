<?php
ob_start();
?>
<p class="modif">
    <a href="index.php?action=ajouterFilm">Ajouter un film</a>
</p>

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
                    <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
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