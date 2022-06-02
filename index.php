<?php
require_once "vendor/autoload.php";

use mvcobjet\controllers\FrontController;
use mvcobjet\controllers\BackController;

use Twig\Environment;

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/src/views');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$frontController = new FrontController($twig);
$backController = new BackController();

$base  = dirname($_SERVER['PHP_SELF']);
if (ltrim($base, '/')) {
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$klein = new \Klein\Klein();

$klein->respond('GET', '/', function ($request, $response) {
    $response->redirect('./listActors');
});

$klein->respond('GET', '/listActors', function () use ($frontController) {
    $frontController->listActors();
});

$klein->respond('GET', '/actor/[:id]', function ($request) use ($frontController) {
    $frontController->getActor($request->id);
});

$klein->respond('GET', '/actor/[:id]/films', function ($request) use ($frontController) {
    $frontController->getMoviesforActor($request->id);
});

$klein->respond('GET', '/addActor', function () {
    require("src/views/viewAddActor.php");
});

$klein->respond('POST', '/addActor', function ($request, $response) use ($backController) {
    $backController->addActor($request->paramsPost());
<<<<<<< Updated upstream
    $response->redirect('http://localhost/mvcobjet/listActors');
=======
>>>>>>> Stashed changes
});

$klein->respond('POST', '/updateActor', function ($request, $response) use ($backController) {
    $backController->updateActor($request->paramsPost());
<<<<<<< Updated upstream
    $response->redirect('http://localhost/mvcobjet/listActors');
=======
>>>>>>> Stashed changes
});

$klein->respond('GET', '/updateActor/[:id]', function ($request) use ($frontController) {
    $frontController->getActor($request->id);
});

<<<<<<< Updated upstream
$klein->respond('GET', '/actorMovies/[:id]', function ($request) use ($frontController) {
    $movies = $frontController->getMoviesforActor($request->id);
    require("src/views/viewActorMovies.php");
});

$klein->respond('GET', '/listDirectors', function () use ($frontController) {
    $res = $frontController->listDirectors();
    echo "<h2> Liste des directeurs </h2>";
    require("src/views/viewListDirectors.php");
});

$klein->respond('GET', '/director/[:id]', function ($request) use ($frontController) {
    $director = $frontController->getDirector($request->id);
    echo "<h2> Directeur </h2>";
    require("src/views/viewDirector.php");
});

$klein->respond('GET', '/director/[:id]/films', function ($request) use ($frontController) {
    $movies = $frontController->getMoviesforDirector($request->id);
    echo "<h2> Films du directeur </h2>";
    require("src/views/viewDirectorMovies.php");
});

$klein->respond('GET', '/addDirector', function () {
    require("src/views/viewAddDirector.php");
});

$klein->respond('POST', '/addDirector', function ($request, $response) use ($backController) {
    $backController->addDirector($request->paramsPost());
    $response->redirect('http://localhost/mvcobjet/listDirectors');
});

$klein->respond('POST', '/updateDirector', function ($request, $response) use ($backController) {
    $backController->updateDirector($request->paramsPost());
    $response->redirect('http://localhost/mvcobjet/listDirectors');
});

$klein->respond('GET', '/updateDirector/[:id]', function ($request) use ($frontController) {
    $director = $frontController->getDirector($request->id);
    require("src/views/viewUpdateDirector.php");
});

$klein->respond('GET', '/deleteActor/[:id]', function ($request, $response) use ($backController) {
    $backController->deleteActor($request->id);
    $response->redirect('http://localhost/mvcobjet/listActors');
});

$klein->respond('GET', '/deleteDirector/[:id]', function ($request, $response) use ($backController) {
    $backController->deleteDirector($request->id);
    $response->redirect('http://localhost/mvcobjet/listDirectors');
});

// view list movies 
$klein->respond('GET', '/listMovies', function () use ($frontController) {
    $res = $frontController->listMovies();
    echo "<h2> Liste des films </h2>";
    require("src/views/viewListMovies.php");
});
// add movie
$klein->respond('GET', '/addMovie', function () {
    require("src/views/viewAddMovie.php");
});
// update movie 
$klein->respond('GET', '/updateMovie/[:id]', function ($request) use ($frontController) {
    $movie = $frontController->getMovie($request->id);
    $genre = $frontController->getMovieGenre($request->id);
    require("src/views/viewUpdateMovie.php");
});
// $klein->respond('GET', '/hello', function () {
//     return 'hello World';
// });

=======
>>>>>>> Stashed changes
$klein->dispatch();
