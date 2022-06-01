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
$klein->respond('GET', '/', function () use ($frontController) {
    // $frontController->index();
});

$klein->respond('GET', '/listActors', function () use ($frontController) {
    $frontController->listActors();
});

$klein->respond('GET', '/actor/[:id]', function ($request) use ($frontController) {
    $actor = $frontController->getActor($request->id);
    echo "<h2> Acteur </h2>";
    require("src/views/viewActor.php");
});

$klein->respond('GET', '/actor/[:id]/films', function ($request) use ($frontController) {
    $movies = $frontController->getMoviesforActor($request->id);
    echo "<h2> Films de l'acteur </h2>";
    require("src/views/viewActorMovies.php");
});

$klein->respond('GET', '/addActor', function () {
    require("src/views/viewAddActor.php");
});

$klein->respond('POST', '/addActor', function ($request) use ($backController) {
    $backController->addActor($request->paramsPost());
    echo "<h2> Acteur ajouté </h2>";
});

$klein->respond('POST', '/updateActor', function ($request) use ($backController) {
    $backController->updateActor($request->paramsPost());
    echo "<h2> Acteur modifié </h2>";
});

$klein->respond('GET', '/updateActor/[:id]', function ($request) use ($frontController) {
    $actor = $frontController->getActor($request->id);
    require("src/views/viewUpdateActor.php");
});

// $klein->respond('GET', '/hello', function () {
//     return 'hello World';
// });

$klein->dispatch();
