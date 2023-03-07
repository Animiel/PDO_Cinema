<?php
namespace Controller;
use Model\Connect;

class CinemaController {

    public function listeFilms() {
        $pdo = Connect::seConnecter();
        $sqlQuery = "SELECT id_film, titre_film, YEAR(annee_film) AS annee_sortie, nom_realisateur, prenom_realisateur, TIME_FORMAT(SEC_TO_TIME(duree_film*60), '%H:%i') AS duree_heure
            FROM film
            INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
            ORDER BY annee_film DESC";
        $requete = $pdo->query($sqlQuery);

        require "view/listeFilms.php";
    }

    
    public function detailFilm($id) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $pdo = Connect::seConnecter();
            $sqlFilm = "SELECT titre_film, annee_film, duree_film, resume_film, note_film, url_image, nom_realisateur, prenom_realisateur
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
                            INNER JOIN role ON casting.id_role = role.id_role
                            WHERE casting.id_film = :identite";
            $sqlStateCasting = $pdo->prepare($sqlCasting);
            $sqlStateCasting->execute([
                ':identite' => $id
            ]);

            $film = $sqlStateFilm->fetch();
            $casting = $sqlStateCasting->fetchAll();

            if ($film['note_film'] == 0) {
                $result = str_repeat("<i class='fa-regular fa-star'></i>", 5);
            }
            else {
                $reste = 5 - $film['note_film'];
                $result = str_repeat("<i class='fa-solid fa-star'></i>", $film['note_film']).str_repeat("<i class='fa-regular fa-star'></i>", $reste);
            }

            $listeCasting = "";
            foreach ($casting as $cast) {
                $listeCasting .= "<li>".$cast['prenom_acteur']." ".$cast['nom_acteur']." (".$cast['nom_role'].")</li><br>";
            }

            require "view/detailFilm.php";
            
        }
    }

    public function homepage() {
        require "view/homepage.php";  
    }

    public function listeActeurs() {
        $pdo = Connect::seConnecter();
        $sqlActeur = "SELECT id_acteur, prenom_acteur, nom_acteur, sexe_acteur
                    FROM acteur
                    ORDER BY nom_acteur, prenom_acteur";
        $requete = $pdo->query($sqlActeur);
        $acteurs = $requete->fetchAll();

        require "view/listeActeurs.php";
    }
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
//                     <td><a href='detailFilm.php?id=".$film['id_film']."'>".$film['titre_film']."</a></td>
//  duree_film  resume_film  note_film  url_image             <td>".$film['annee_film']."</td>
//                     <td>".$film['prenom_realisateur']." ".$film['nom_realisateur']."</td>
//                     <td>".$film['duree_heure']."</td>
//                 </tr>";
// }
// $result .= "</tbody></table>";
// echo $result;
?>
-->