<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});

$ctrlCinema = new CinemaController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        
        case 'homepage' :
            $ctrlCinema->homepage();
        break;

        case 'listeFilms' :
            $ctrlCinema->listeFilms();
        break;
        
        case 'detailFilm' :
            $id = $_GET['id'];
            $ctrlCinema->detailFilm($id);
        break;

        case 'listeActeurs' :
            $ctrlCinema->listeActeurs();
        break;
        
        case 'detailActeur' :
            $id = $_GET['id'];
            $ctrlCinema->detailActeur($id);
        break;

        case 'listeRealisateurs' :
            $ctrlCinema->listeRealisateurs();
        break;

        case 'detailRealisateur' :
            $id = $_GET['id'];
            $ctrlCinema->detailRealisateur($id);
        break;
    }
}

?>