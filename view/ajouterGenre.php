<?php
ob_start();
?>

<form action="index.php?action=ajouterGenre" method="post">
    <p>
        <label>Nom du genre :
            <input type="text" name="name" required>
        </label>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter le genre">
    </p>
</form>

<?php
$titre = "Ajouter un genre";
$titre_secondaire = "Formulaire d'ajout";
$contenu = ob_get_clean();
require "view/template.php";
?>