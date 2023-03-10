<?php
ob_start();
?>

<table>
    <thead>
        <tr>
            <th>NOM ACTEUR</th>
            <th>TITRE DU FILM</th>
            <th>ANNEE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($casting as $cast) { ?>
            <tr>
                <td><?= $cast['prenom_acteur'] ?> <?= $cast['nom_acteur'] ?></td>
                <td><?= $cast['titre_film'] ?></td>
                <td><?= $cast['date_sortie'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Détail de rôle";
$titre_secondaire = $role['nom_role'];
$contenu = ob_get_clean();
require "view/template.php";
?>