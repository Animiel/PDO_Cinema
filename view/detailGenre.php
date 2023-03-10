<?php
ob_start();
?>

<table>
    <thead>
        <tr>
            <th>TITRE DU FILM</th>
            <th>ANNEE DE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listeFilms as $film) { ?>
            <tr>
                <td><?= $film['titre_film'] ?></td>
                <td><?= $film['date_sortie'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Détail de genre";
$titre_secondaire = $genre['nom_genre'];
$contenu = ob_get_clean();
require "view/template.php";
?>