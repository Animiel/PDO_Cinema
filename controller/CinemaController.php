<?php
namespace Controller;
use Model\Connect;

class CinemaController {

    public function listeFilms() {
        $pdo = Connect::seConnecter();
        $sqlQuery = "SELECT id_film, titre, YEAR(annee_sortie_fr) AS annee_sortie, nom_realisateur, prenom_realisateur, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree_heure
            FROM film
            INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
            ORDER BY annee_sortie_fr DESC";
        $requete = $pdo->query($sqlQuery);

        require "view/listeFilms.php";
    }

    
    public function detailFilm($id) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $pdo = Connect::seConnecter();
            $sqlFilm = "SELECT titre, annee_sortie_fr, duree, synopsis, note, affiche, nom_realisateur, prenom_realisateur
                        FROM film
                        INNER JOIN realisateur r ON film.id_realisateur = r.id_realisateur
                        WHERE film.id_film = :identite";
            $sqlStateFilm = $pdo->prepare($sqlFilm);
            $sqlStateFilm->execute([
                ':identite' => $id
            ]);

            $sqlCasting = "SELECT prenom_acteur, nom_acteur, nom_role
                            FROM acteur
                            INNER JOIN casting ON acteur.id_acteur = casting.id_acteur
                            INNER JOIN film ON casting.id_film = film.id_film
                            INNER JOIN role_acteur ON casting.id_role = role_acteur.id_role
                            WHERE casting.id_film = :identite";
            $sqlStateCasting = $pdo->prepare($sqlCasting);
            $sqlStateCasting->execute([
                ':identite' => $id
            ]);

            require "view/detailFilm.php";

        }
    }

    // public function afficherNote() {
    // if ($film['note'] == 0) {
    //     $result = str_repeat("<i class='fa-regular fa-star'></i>", 5);
    // }
    // else {
    //     $reste = 5 - $film['note'];
    //     $result = str_repeat("<i class='fa-solid fa-star'></i>", $film['note']).str_repeat("<i class='fa-regular fa-star'></i>", $reste);
    // }
    // echo $result;
    // }

    // public function afficherCasting() {
    //     foreach ($casting as $cast) {
    //         echo "<li>".$cast['prenom_acteur']." ".$cast['nom_acteur']." (".$cast['nom_role'].")</li><br>";
    //     }
    // }
}

?>









<!-- // AFFICHAGE
<'?php
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
//                     <td><a href='detailFilm.php?id=".$film['id_film']."'>".$film['titre']."</a></td>
//  duree  synopsis  note  affiche             <td>".$film['annee_sortie_fr']."</td>
//                     <td>".$film['prenom_realisateur']." ".$film['nom_realisateur']."</td>
//                     <td>".$film['duree_heure']."</td>
//                 </tr>";
// }
// $result .= "</tbody></table>";
// echo $result;
?>
-->