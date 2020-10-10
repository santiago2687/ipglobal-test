<?php

include_once '../../vendor/autoload.php';

use App\classes\Omdb;

$omdbMovies = new Omdb();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['movieName'])) {
        $movieName = trim($_GET['movieName']);
        $movieName =str_replace(' ', '+', $movieName);
        $movies = $omdbMovies->getMoviesByName($movieName);
        echo json_encode($movies, true);
    };

}
