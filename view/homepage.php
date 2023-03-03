<?php
ob_start();
?>

<ul>
    <li><a href="view/index.php?action=listeFilms">Voir la liste des films en stock</a></li>

<?php

$titre = "Acceuil";
$titre_secondaire = "Choix de directions";
$contenu = ob_get_clean();
require "view/template.php";

?>