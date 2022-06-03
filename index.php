<?php
require_once "vendor/autoload.php";

use mvcobjet\controllers\FrontController;
use mvcobjet\controllers\BackController;


// rappel autoload 
// ainsi je peux créer une instance de mon controller front 

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

// instanciation d'un objet klein 
$klein = new \Klein\Klein();

// je cré une closure avec l'objet $fronController qui sera utilisé 
// plus tard quand la fonction de callback sera executée. 
// Elle sera executée quand on tapera dans l'URL  le chemin jusqu'a la racine .
$klein->respond('GET', '/', function ($request, $response) use ($frontController) {
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

$klein->respond('GET', '/addActor', function () use ($frontController) {
    $frontController->addActor();
});

$klein->respond('POST', '/addActor', function ($request, $response) use ($backController) {
    $backController->addActor($request->paramsPost());
    $response->redirect('./listActors');
});

$klein->respond('POST', '/updateActor', function ($request, $response) use ($backController) {
    $backController->updateActor($request->paramsPost());
    $response->redirect('./listActors');
});

$klein->respond('GET', '/updateActor/[:id]', function ($request) use ($frontController) {
    $frontController->updateActor($request->id);
});

$klein->respond('GET', '/actorMovies/[:id]', function ($request) use ($frontController) {
    $frontController->getMoviesforActor($request->id);
});

$klein->respond('GET', '/listDirectors', function () use ($frontController) {
    $frontController->listDirectors();
});

$klein->respond('GET', '/director/[:id]', function ($request) use ($frontController) {
    $frontController->getDirector($request->id);
});

$klein->respond('GET', '/director/[:id]/films', function ($request) use ($frontController) {
    $frontController->getMoviesforDirector($request->id);
});

$klein->respond('GET', '/addDirector', function ($request, $response) use ($frontController) {
    $frontController->addDirector();
    $response->redirect('./listDirectors');
});

$klein->respond('POST', '/addDirector', function ($request, $response) use ($backController) {
    $backController->addDirector($request->paramsPost());
});

$klein->respond('POST', '/updateDirector', function ($request, $response) use ($backController) {
    $backController->updateDirector($request->paramsPost());
});

$klein->respond('GET', '/updateDirector/[:id]', function ($request) use ($frontController) {
    $frontController->getDirector($request->id);
});

$klein->respond('GET', '/deleteActor/[:id]', function ($request, $response) use ($backController) {
    $backController->deleteActor($request->id);
    $response->redirect('../listActors');
});

$klein->respond('GET', '/deleteDirector/[:id]', function ($request, $response) use ($backController) {
    $backController->deleteDirector($request->id);
    $response->redirect('../listDirectors');
});

$klein->respond('GET', '/listMovies', function () use ($frontController) {
    $frontController->listMovies();
});

$klein->respond('GET', '/movie/[:id]', function ($request) use ($frontController) {
    $frontController->getMovie($request->id);
});

$klein->respond('GET', '/addMovie', function () use ($frontController) {
    $frontController->addMovie();
});

$klein->respond('POST', '/addMovie', function ($request, $response) use ($backController) {
    $backController->addMovie($request->paramsPost());
    $response->redirect('./listMovies');
});

$klein->respond('GET', '/updateMovie/[:id]', function ($request) use ($frontController) {
    $frontController->getMovie($request->id);
});

$klein->dispatch();
