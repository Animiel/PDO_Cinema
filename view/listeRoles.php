<?php
ob_start();
?>

<a href="index.php?action=ajouterRole" class="modif">Ajouter un rôle</a>

<ul>
    <?php foreach ($roles as $role) { ?>
        <li><a href="index.php?action=detailRole&id=<?= $role['id_role'] ?>"><?= $role['nom_role'] ?></a></li>
    <?php } ?>
</ul>

<?php
$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";
?>