


<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});

$ctrlCinema = new CinemaController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        
        case 'listeFilms' : $ctrlCinema->listeFilms();
        break;

        case 'listeActeurs' : $ctrlCinema->listeActeurs();
        break;
    }
}

















// TRAITEMENT

$sqlQuery = "SELECT id_film, titre_film, annee_film, nom_realisateur, prenom_realisateur, TIME_FORMAT(SEC_TO_TIME(duree_film*60), '%H:%i') AS duree_heure
            FROM film
            INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
            ORDER BY annee_film DESC";
$filmsStnt = $mysqlConnection->query($sqlQuery);        //exécution de la requête
$films = $filmsStnt->fetchAll();        //créer une array stockée dans $films

?>
<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE DE SORTIE</th>
            <th>REALISATEUR</th>
            <th>DUREE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($films as $film) { ?>
                <tr>
                    <td><a href="detailFilm.php?id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
                    <td><?= $film["annee_film"] ?></td>
                    <td><?= $film['prenom_realisateur'] ?> <?= $film['nom_realisateur'] ?></td>
                    <td><?= $film['duree_heure'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php
// AFFICHAGE

// $result = "<table>
//             <thead>
//                 <tr>
//                     <th>TITRE</th>
//                     <th>ANNEE DE SORTIE</th>
//                     <th>REALISATEUR</th>
//                     <th>DUREE</th>
//                 </tr>
//             </thead>
//             <tbody>";
// foreach ($films as $film) {
//     $result .= "<tr>
//                     <td><a href='detailFilm.php?id=".$film['id_film']."'>".$film['titre_film']."</a></td>
//                     <td>".$film['annee_film']."</td>
//                     <td>".$film['prenom_realisateur']." ".$film['nom_realisateur']."</td>
//                     <td>".$film['duree_heure']."</td>
//                 </tr>";
// }
// $result .= "</tbody></table>";
// echo $result;
?>



</body>
</html>