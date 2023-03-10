<?php
ob_start();
?>

<form action="index.php?action=ajouterActeur" method="post">
    <p>
        <label>Nom de l'acteur :
            <input type="text" name="nom_acteur" required>
        </label>
    </p>

    <p>
        <label>Prénom de l'acteur :
            <input type="text" name="prenom_acteur" required>
        </label>
    </p>

    <p>
        <label>Date de naissance :
            <input type="date" name="date_naissance" required>
        </label>
    </p>

    <p>
        <label>Sexe de l'acteur :
            <input type="text" name="sexe" required>
        </label>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter l'acteur">
    </p>
</form>

<?php
$titre = "Ajouter un acteur";
$titre_secondaire = "Formulaire d'ajout";
$contenu = ob_get_clean();
require "view/template.php";
?>