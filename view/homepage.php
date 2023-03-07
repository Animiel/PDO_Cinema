<?php
ob_start();
?>

<ul>
    <li><a href="index.php?action=listeFilms">Voir la liste des films en stock</a></li>
</ul>

<?php

$titre = "Acceuil";
$titre_secondaire = "Choix de directions";
$contenu = ob_get_clean();
require "view/template.php";

?>