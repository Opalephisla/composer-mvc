<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;

class FrontController
{
    private $actorService;
    public function __construct()
    {
        $this->actorService = new ActorService();
    }
    public function listActors()
    {
        $res = $this->actorService->getAllActors();
        return $res;
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
