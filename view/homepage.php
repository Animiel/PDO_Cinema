<?php
ob_start();
?>

<ul>
    <li><a href="index.php?action=listeFilms">Voir la liste des films disponibles</a></li>
    <li><a href="index.php?action=listeActeurs">Voir la liste des acteurs disponibles</a></li>
    <li><a href="index.php?action=listeRealisateurs">Voir la liste des réalisateurs disponibles</a></li>
    <li><a href="index.php?action=listeGenres">Voir la liste des genres disponibles</a></li>
</ul>

<?php

$titre = "Acceuil";
$titre_secondaire = "Choix de directions";
$contenu = ob_get_clean();
require "view/template.php";

?>