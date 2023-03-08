<?php
ob_start();
?>

<p>
    <?= $detailActeur['nom_acteur'] ?> <?= $detailActeur['prenom_acteur'] ?> est né(e) le <?= $detailActeur['naissance_acteur'] ?>.
</p>

<h3>Filmographie</h3>

<table>
    <thead>
        <tr>
            <th>TITRE DU FILM</th>
            <th>DATE DE SORTIE</th>
            <th>ROLE DANS LE FILM</th>
        </tr>
    </thead>
    <tbody>
        <?= $result ?>
    </tbody>
</table>

<?php
$titre = "Détail d'acteur";
$titre_secondaire = $detailActeur['nom_acteur']." ".$detailActeur['prenom_acteur'];
$contenu = ob_get_clean();
require "view/template.php";
?>