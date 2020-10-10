<?php

include_once '../../vendor/autoload.php';

use App\classes\Omdb;

$omdbMovies = new Omdb();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['movieId']));
    $movieId = $_GET['movieId'];
    $movies = $omdbMovies->getMoviesById($movieId);
    echo json_encode($movies, true);
}
