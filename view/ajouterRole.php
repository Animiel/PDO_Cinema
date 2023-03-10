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
        <label for="listeActeurs">Acteur(s) interprétant le rôle :</label>
            <select id="listeActeurs" name="acteurs[]" multiple="true">
                <?php foreach ($acteurs as $acteur) { ?>
                    <option value="<?= $acteur['id_acteur'] ?>">
                        <?= $acteur['nom_acteur'] ?> <?= $acteur['prenom_acteur'] ?>
                    </option>
                <?php } ?>
            </select>
        <br>
        Si l'acteur n'apparaît pas dans la liste, merci de l'ajouter via ce lien : <a href="index.php?action=ajouterActeur" class="modif">Ajouter un acteur</a>
    </p>

    <p>
        <label for="listeFilms">Film(s) concerné(s) :</label>
            <select id="listeFilms" name="films[]" multiple="true">
                <?php foreach ($films as $film) { ?>
                    <option value="<?= $film['id_film'] ?>">
                        <?= $film['titre_film'] ?>
                    </option>
                <?php } ?>
            </select>
        <br>
        Si le film n'apparaît pas dans la liste, merci de l'ajouter via ce lien : <a href="index.php?action=ajouterFilm" class="modif">Ajouter un film</a>
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