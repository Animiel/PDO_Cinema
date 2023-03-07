<?php
ob_start();
?>

<table>
    <thead>
        <tr>
            <th>TITRE DU FILM</th>
            <th>ANNEE DE SORTIE</th>
            <th>A JOUE DANS SON FILM ?</th>
            <th>ROLE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($filmo as $film) {?>
            <tr>
                <td><?= $film['titre_film'] ?></td>
                <td><?= $film['annee_film'] ?></td>
                <?php
                    if ($film['civilite_real'] == $film['civilite_acteur']) { ?>
                    <td><?= "Oui" ?></td>
                    <td><?= $film['nom_role'] ?></td>
                <?php }
                    else { ?>
                        <td><?= "Non" ?></td>
                        <td></td>
                <?php } ?>

        <?php }?>

<?php
$titre = "Détail de réalisateur";
$titre_secondaire = $film['civilite_real'];
$contenu = ob_get_clean();
require "view/template.php";
?>