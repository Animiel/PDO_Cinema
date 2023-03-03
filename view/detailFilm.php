

<a href="index.php" class='back'>Retour aux films</a>

<?php

$id = isset($_GET['id']) ? $_GET['id'] : "";

$sqlFilm = "SELECT titre_film, annee_film, duree_film, resume_film, note_film, url_image, nom_realisateur, prenom_realisateur
            FROM film
            INNER JOIN realisateur r ON film.id_realisateur = r.id_realisateur
            WHERE film.id_film = :identite";
$sqlStateFilm = $sql->prepare($sqlFilm);
$sqlStateFilm->execute([
    ':identite' => $id
]);
$film = $sqlStateFilm->fetch();





$sqlCasting = "SELECT prenom_acteur, nom_acteur, nom_role
                FROM acteur
                INNER JOIN casting ON acteur.id_acteur = casting.id_acteur
                INNER JOIN film ON casting.id_film = film.id_film
                INNER JOIN role ON casting.id_role = role.id_role
                WHERE casting.id_film = :identite";
$sqlStateCasting = $sql->prepare($sqlCasting);
$sqlStateCasting->execute([
    ':identite' => $id
]);
$casting = $sqlStateCasting->fetchAll();

?>



<h2><strong><?= $film['titre_film'] ?></strong></h2>

<h3>Synopsis</h3>
<p><?= $film['resume_film'] ?></p>

<p>
    <strong>Année de sortie :</strong> <?= $film['annee_film'] ?><br>
    <strong>Realisateur :</strong> <?= $film['prenom_realisateur'] ?> <?= $film['nom_realisateur'] ?><br>
    <strong>Durée :</strong> <?= $film['duree_film'] ?> minutes.<br>
    <strong>Note :</strong>
    <?php
    if ($film['note_film'] == 0) {
        $result = str_repeat("<i class='fa-regular fa-star'></i>", 5);
    }
    else {
        $reste = 5 - $film['note_film'];
        $result = str_repeat("<i class='fa-solid fa-star'></i>", $film['note_film']).str_repeat("<i class='fa-regular fa-star'></i>", $reste);
    }
    echo $result;
    ?>

</p>

<h3><strong>Casting</strong></h3>

<ul>
    <?php
    foreach ($casting as $cast) {
        echo "<li>".$cast['prenom_acteur']." ".$cast['nom_acteur']." (".$cast['nom_role'].")</li><br>";
    }
    ?>
</ul>
