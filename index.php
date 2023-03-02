<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

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

$sqlQuery = "SELECT titre_film, annee_film, nom_realisateur, prenom_realisateur, TIME_FORMAT(SEC_TO_TIME(duree_film*60), '%H:%i') AS duree_heure
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