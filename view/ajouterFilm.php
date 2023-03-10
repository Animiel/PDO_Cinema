<?php
ob_start();
?>

<form action="index.php?action=ajouterFilm" method="post">
    <p>
        <label>Titre du film :
            <input type="text" name="titre_film" required>
        </label>
    </p>

    <p>
        <label>Date de sortie du film :
            <input type="date" name="date_film" required>
        </label>
    </p>

    <p>
        <label>Durée du film (en minutes) :
            <input type="number" name="duree_film" required>
        </label>
    </p>

    <p>
        <label>Note du film (sur 5) :
            <input type="number" name="note_film" min="0" max="5" required>
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
            <select name="realisateurs" required>
                <?php foreach ($reals as $real) { ?>
                    <option value="<?= $real['id_realisateur'] ?>">
                        <?= $real['nom_realisateur'] ?> <?= $real['prenom_realisateur'] ?>
                    </option>
                <?php } ?>
            </select>
        </label><br>
        Si le réalisateur n'apparaît pas dans la liste, merci de l'ajouter via ce lien : <a href="index.php?action=ajouterRealisateur" class="modif">Ajouter un réalisateur</a>
    </p>

    <p>
        <label>Catégorie(s) du film :
            <?php foreach ($genres as $genre) { ?>
                <input class="box" type="checkbox" id=<?= $genre['nom_genre'] ?> name="genres[]" value=<?= $genre['id_genre'] ?>>
                <label for=<?= $genre['nom_genre'] ?>><?= $genre['nom_genre'] ?></label>
            <?php } ?>
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