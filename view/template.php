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
        <a href="index.php?action=listeFilms" class="navi">Retour aux films</a>
        <a href="index.php?action=homepage" class="navi">Acceuil</a>
    </nav>

    <h1>Intro PDO Cinéma</h1>
        <h2><?= $titre_secondaire ?></h2>

        <?= $contenu ?>
    
</body>
</html>