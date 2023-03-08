<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <a href="" class="navi">Acceuil</a>
        <a href="index.php?action=listeFilms" class="navi">Films</a>
        <a href="index.php?action=listeActeurs" class="navi">Acteurs</a>
        <a href="index.php?action=listeRealisateurs" class="navi">Réalisateurs</a>
        <a href="index.php?action=listeGenres" class="navi">Genres</a>
    </nav>

    <h1>Intro PDO Cinéma</h1>
        <h2><?= $titre_secondaire ?></h2>

        <?= $contenu ?>
    
</body>
</html>


<!--temporisation de sortie :
    Débute par ob_start() et finit par ob_get_clean().
    Le contenu entre ces 2 fonctions ne sera affiché que lorsqu'on appellera la variable dans laquelle on le stock (souvent $contenu).

requete http
    Demande d'un utilisateur faite à un serveur pour accéder à une page.

PDO 
    PHP Data Objects = Extension permettant d'accéder d'accéder à la base de données avec PHP.

injection sql ou SQLi (requete préparée)
    Exploitation d'une faille de sécurité permettant d'utiliser du code SQL pour modifier une requête et atteindre des informations importantes.
    La requête préparée permet d'être exécutée plusieurs fois et protège du SQLi.

BDD
    Ensemble d'infos facilement accessible.

faille xss (cross site scripting)
    Faille de sécurité -> injecter code côté client
    -> toujours encoder les données saisies par l'utilisateur.-->