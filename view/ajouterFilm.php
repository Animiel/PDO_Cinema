<?php
ob_start();

?>

<form action="index.php?action=ajouterFilm" method="post" enctype="multipart/form-data">
    <p>
        <label>Titre du film :
            <input type="text" name="titre_film">
        </label>
    </p>

    <p>
        <label>Date de sortie du film :
            <input type="number" name="date_film">
        </label>
    </p>

    <p>
        <label>Durée du film (en minutes) :
            <input type="number" name="duree_film">
        </label>
    </p>

    <p>
        <label>Note du film (sur 5) :
            <input type="number" name="note_film">
        </label>
    </p>

    <p>
        <label>Affiche du film :
            <input type="url" name="affiche_film">
        </label>
    </p>

    <p>
        <label>Synopsis du film :<br>
            <textarea name="synopsis" rows="5" cols="50"></textarea>
        </label>
    </p>

    <p>
        <label>Réalisateur :
            <select name="realisateurs">
                <?php foreach ($reals as $real) { ?>
                    <option value="<?= $real['id_realisateur'] ?>">
                        <?= $real['nom_realisateur'] ?> <?= $real['prenom_realisateur'] ?>
                    </option>
                <?php } ?>
            </select>
        </label>
    </p>

    <p>
        <input type="submit" name="submit" value="Ajouter le film">
    </p>
</form>

<?php
$titre = "Ajouter un film";
$titre_secondaire = "Formulaire d'ajout";
$contenu = ob_get_clean();
require "view/template.php";
?>