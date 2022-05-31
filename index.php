<?php
require_once "vendor/autoload.php";

use mvcobjet\controllers\FrontController;
use mvcobjet\controllers\BackController;


// rappel autoload 
// ainsi je peux créer une instance de mon controller front 


$frontController = new FrontController();
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
    $frontController->index();
});

$klein->respond('GET', '/listeActeurs', function () use ($backController) {

    $backController->liste();
});

$klein->respond('GET', '/acteur/[:id]', function ($request) use ($backController) {
    $id = $request->id;
    $backController->getActor($id);
});

$klein->respond('GET', '/hello', function () {
    return 'hello World';
});

$klein->dispatch();
