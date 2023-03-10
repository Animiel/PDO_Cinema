<?php
ob_start();
?>

<form action="index.php?action=ajouterRole" method="post">
    <p>
        <label>Nom du rôle :
            <input type="text" name="name" required>
        </label>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter le rôle">
    </p>
</form>

<?php
$titre = "Ajouter un rôle";
$titre_secondaire = "Formulaire d'ajout";
$contenu = ob_get_clean();
require "view/template.php";
?>