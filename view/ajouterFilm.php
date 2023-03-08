<?php
ob_start();
?>

<form>
    <label>Titre du film :<br>
        <input type="text" id="titre_film">
    </label><br><br>

    <label>Date de sortie du film :<br>
        <input type="date" id="date_film">
    </label><br><br>

    <label>Durée du film :<br>
        <input type="number" id="duree_film">
    </label><br><br>

    <label>Note du film :<br>
        <input type="number" id="note_film">
    </label><br><br>

    <label>Affiche du film :<br>
        <input type="file" id="affiche_film">
    </label><br><br>

    <label>Synopsis du film :<br>
        <textarea rows="5" cols="50">
        </textarea>
    </label><br><br>
</form>

<?php
$titre = "Ajout film";
$titre_secondaire = "Formulaire d'ajout";
$contenu = ob_get_clean();
require "view/template.php";
?>