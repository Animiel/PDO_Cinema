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

        case 'listeGenres' :
            $ctrlCinema->listeGenres();
        break;

        case 'detailGenre' :
            $id = $_GET['id'];
            $ctrlCinema->detailGenre($id);
        break;

        case 'listeRoles' :
            $ctrlCinema->listeRoles();
        break;

        case 'detailRole' :
            $id = $_GET['id'];
            $ctrlCinema->detailRole($id);
        break;

        case 'ajouterFilm' :
            $ctrlCinema->ajouterFilm();
        break;

        case 'ajouterRealisateur' :
            $ctrlCinema->ajouterRealisateur();
        break;

        case 'ajouterGenre' :
            $ctrlCinema->ajouterGenre();
        break;

        case 'ajouterRole' :
            $ctrlCinema->ajouterRole();
        break;

        case 'ajouterActeur' :
            $ctrlCinema->ajouterActeur();
        break;
    }
}

// require "view/homepage.php";

?>