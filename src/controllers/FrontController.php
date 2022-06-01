<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;

class FrontController
{
    private $actorService;
    private $twig;

    public function __construct($t)
    {
        $this->actorService = new ActorService();
        $this->twig = $t;
    }

    public function listActors()
    { // recup des acteurs (liste d'objet)
        $result = $this->actorService->getAllActors();
        // compilation twig + acteur = html
        echo $this->twig->render('actors.html.twig', ['actors' => $result]);
    }
    public function getActor($id)
    {
        $res = $this->actorService->getOneActor($id);
        return $res;
    }
    public function getMoviesforActor($id)
    {
        $res = $this->actorService->getActorMovies($id);
        return $res;
    }
}
