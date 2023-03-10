<?php
ob_start();
?>

<form action="index.php?action=ajouterRealisateur" method="post">
    <p>
        <label>Nom du réalisateur :
            <input type="text" name="name" required>
        </label>
    </p>

    <p>
        <label>Prénom du réalisateur :
            <input type="text" name="firstname" required>
        </label>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter le réalisateur">
    </p>
</form>

<?php
$titre = "Ajouter un réalisateur";
$titre_secondaire = "Formulaire d'ajout";
$contenu = ob_get_clean();
require "view/template.php";
?>