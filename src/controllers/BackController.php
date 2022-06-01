<?php

namespace mvcobjet\controllers;

use mvcobjet\models\daos\ActorDao;
use mvcobjet\models\daos\DirectorDao;
use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;

class BackController
{
    private $actorService;
    private $directorService;
    public function __construct()
    {
        $this->actorService = new ActorService();
        $this->directorService = new DirectorService();
    }
    public function addActor($request)
    {
        $res = $this->actorService->addActor($request);
        return $res;
    }
    public function updateActor($request)
    {
        $res = $this->actorService->updateActor($request);
        return $res;
    }
    public function deleteActor($request)
    {
        $res = $this->actorService->deleteActor($request);
        return $res;
    }
    public function findActorbyId($id)
    {
        $res = $this->actorService->getOneActor($id);
        return $res;
    }

    public function addDirector($request)
    {
        $res = $this->directorService->addDirector($request);
        return $res;
    }
    public function updateDirector($request)
    {
        $res = $this->directorService->updateDirector($request);
        return $res;
    }
    public function findDirectorbyId($id)
    {
        $res = $this->directorService->getOneDirector($id);
        return $res;
    }
    public function deleteDirector($request)
    {
        $res = $this->directorService->deleteDirector($request);
        return $res;
    }
}
