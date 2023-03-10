<?php
ob_start();
?>
<p class="modif">
    <a href="index.php?action=ajouterRole">Ajouter un rôle</a>
</p>

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