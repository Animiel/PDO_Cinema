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

    public function detailActeur($id) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $pdo = Connect::seConnecter();
            $sqlActeur = "SELECT id_acteur, prenom_acteur, nom_acteur, DATE_FORMAT(date_naissance_acteur, '%d/%m/%Y') AS naissance_acteur, sexe_acteur
                        FROM acteur
                        WHERE id_acteur = :identite";
            $acteurState = $pdo->prepare($sqlActeur);
            $acteurState->execute([
                ":identite" => $id
            ]);
            $detailActeur = $acteurState->fetch();

            $sqlFilmo = "SELECT titre_film, annee_film, nom_role
                        FROM film
                        INNER JOIN casting ON casting.id_film = film.id_film
                        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                        INNER JOIN role ON casting.id_role = role.id_role
                        WHERE acteur.id_acteur = :identite
                        ORDER BY film.annee_film DESC";
            $filmoState = $pdo->prepare($sqlFilmo);
            $filmoState->execute([
                ":identite" => $id
            ]);
            $filmo = $filmoState->fetchAll();

            $result = "";
            foreach ($filmo as $film) {
                $result .= "<tr>
                            <td>".$film['titre_film']."</td>
                            <td>".$film['annee_film']."</td>
                            <td>".$film['nom_role']."</td>
                            </tr>";
            }

            require "view/detailActeur.php";
        }
    }

    public function listeRealisateurs() {
        $pdo = Connect::seConnecter();
        $sqlRealisateur = "SELECT id_realisateur, nom_realisateur, prenom_realisateur
                        FROM realisateur
                        ORDER BY nom_realisateur, prenom_realisateur";
        $stateRealisateur = $pdo->query($sqlRealisateur);
        $listeReals = $stateRealisateur->fetchAll();

        require "view/listeRealisateurs.php";
    }

    public function detailRealisateur($id) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $pdo = Connect::seConnecter();
            $sqlReal = "SELECT nom_realisateur, prenom_realisateur
                        FROM realisateur
                        WHERE id_realisateur = :identite";
            $realState = $pdo->prepare($sqlReal);
            $realState->execute([
                ":identite" => $id
            ]);
            $realisateur = $realState->fetch();

            $sqlFilmo = "SELECT realisateur.id_realisateur, titre_film, annee_film, role.nom_role,CONCAT( realisateur.nom_realisateur, ' ',   realisateur.prenom_realisateur) AS civilite_real, CONCAT (nom_acteur,' ', prenom_acteur) as civilite_acteur
                        FROM film
                        INNER JOIN casting ON casting.id_film = film.id_film
                        INNER JOIN role ON casting.id_role = role.id_role
                        INNER JOIN acteur ON casting.id_acteur = acteur.id_acteur
                        INNER JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
                        WHERE realisateur.id_realisateur = :identite
                        ORDER BY annee_film DESC";
            $stateFilmo = $pdo->prepare($sqlFilmo);
            $stateFilmo->execute([
                "identite" => $id
            ]);
            $filmo = $stateFilmo->fetchAll();

            require "view/detailRealisateur.php";
        }
    }

    public function listeGenres() {
        $pdo = Connect::seConnecter();
        $sqlGenres = "SELECT id_genre, nom_genre
                    FROM genre
                    ORDER BY nom_genre";
        $stateGenre = $pdo->query($sqlGenres);
        $genres = $stateGenre->fetchAll();

        require "view/listeGenres.php";
    }

    public function detailGenre($id) {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $pdo = Connect::seConnecter();
            $sqlGenre = "SELECT id_genre, nom_genre
                        FROM genre
                        WHERE id_genre = :identite
                        ORDER BY nom_genre";
            $stateGenre = $pdo->prepare($sqlGenre);
            $stateGenre->execute([
                ":identite" => $id
            ]);
            $genre = $stateGenre->fetch();

            $sqlFilms = "SELECT titre_film, annee_film, gf.id_genre
                        FROM film
                        INNER JOIN genre_film gf ON gf.id_film = film.id_film
                        WHERE gf.id_genre = :identite
                        ORDER BY annee_film DESC";
            $stateFilms = $pdo->prepare($sqlFilms);
            $stateFilms->execute([
                ":identite" => $id
            ]);
            $listeFilms = $stateFilms->fetchAll();

            require "view/detailGenre.php";
        }
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