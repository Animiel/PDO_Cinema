<?php

// CONNEXION A LA BASE DE DONNEES

try {
    $mysqlConnection = new PDO (
        "mysql:host=localhost;dbname=cinemadl8;charset=utf8",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// TRAITEMENT

$sqlQuery = "SELECT titre_film, annee_film, nom_realisateur, prenom_realisateur, CONVERT(duree_film, TIME) AS duree_heure
            FROM film
            INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
            ORDER BY annee_film DESC";
$filmsStnt = $mysqlConnection->query($sqlQuery);        //exécution de la requête
$films = $filmsStnt->fetchAll();        //créer une array stockée dans $films

// AFFICHAGE

$result = "<table>
            <thead>
                <tr>
                    <th>TITRE</th>
                    <th>ANNEE DE SORTIE</th>
                    <th>REALISATEUR</th>
                    <th>DUREE</th>
                </tr>
            </thead>
            <tbody>";
foreach ($films as $film) {
    $result .= "<tr>
                    <td>".$film['titre_film']."</td>
                    <td>".$film['annee_film']."</td>
                    <td>".$film['prenom_realisateur']." ".$film['nom_realisateur']."</td>
                    <td>".$film['duree_heure']."</td>
                </tr>";
}
$result .= "</tbody></table>";
echo $result;
?>